<?php 

    class MultiServer {

        var $pathcache = "cache-server";
        var $filecache = "multiserverdata.cache";
        var $timecache = 60;

        private function fileServerCache(){
            if (!is_dir($this->pathcache)) mkdir($this->pathcache,0775,true);           
            return $this->pathcache.'/'.$this->filecache;
        }
    
        public function isServerCached($cachetime=60) {
            $file = $this->fileServerCache();
            // check the expired file cache.
            $mtime = 0;
            if (file_exists($file)) {
                $mtime = filemtime($file);
            }
            $filetimemod = $mtime + $cachetime;
            // if the renewal date is smaller than now, return true; else false (no need for update)
            if ($filetimemod < time()) {
                return false;
            }
            return true;
        }
    
        public function loadServerCache() {
            $file = $this->fileServerCache();
            if (file_exists($file)) {
                return file_get_contents($file);
            }
            return "";
        }
    
        public function writeServerCache($value) {
            $file = $this->fileServerCache();
            file_put_contents($file, $value, LOCK_EX);
        }

        public function deleteServerCache(){
            $file = $this->fileServerCache();
            if(file_exists($file)) unlink($file);
        }

        public function getServer($api){
            if(!empty($api)){
                if ($this->isServerCached($this->timecache)){
                    return $this->loadServerCache();
                } else {
                    $api = explode(',',$api);
                    if (!empty($api[1])){
                        $r = $this->execMultiRequest($api,true,array(
                                CURLOPT_FOLLOWLOCATION => TRUE,     // we need the last redirected url
                                CURLOPT_RETURNTRANSFER => TRUE,     // we don't need return transfer
                                CURLOPT_SSL_VERIFYHOST => FALSE,    // we don't need verify host
                                CURLOPT_SSL_VERIFYPEER => FALSE     // we don't need verify peer
                            )
                        );
                        $result = "";
                        for ($i=0;$i<count($api);$i++){
                            if($r[$i] == 200) $result .= $api[$i].',';
                        }
                        if (!empty($result)){
                            $data = rtrim($result,",");
                            $this->writeServerCache($data);
                            return $data;
                        }
                    }
                }
            }
            return "";
        }

        /**
         * CURL multi request (Support for GET and POST)
         * 
         * @var $data = an array for target url
         * @var $showhttpstatus = if set to true then will only display http status code. Default is false
         * @var $options = an array to add extra options curl
         * 
         * @return array
         */
        public function execMultiRequest($data, $showhttpstatus = false, $options = array()) {
 
            // array of curl handles
            $curly = array();
            // data to be returned
            $result = array();
           
            // multi handle
            $mh = curl_multi_init();
           
            // loop through $data and create curl handles
            // then add them to the multi-handle
            foreach ($data as $id => $d) {
           
                $curly[$id] = curl_init();
           
                $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
                curl_setopt($curly[$id], CURLOPT_URL, $url);
                if ($showhttpstatus) curl_setopt($curly[$id], CURLOPT_NOBODY, 1);
           
                // post?
                if (is_array($d)) {
                    if (!empty($d['post'])) {
                        curl_setopt($curly[$id], CURLOPT_POST,       1);
                        curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
                    }
                }
           
                // extra options?
                if (!empty($options)) {
                    curl_setopt_array($curly[$id], $options);
                } else {
                    curl_setopt($curly[$id], CURLOPT_HEADER,         0);
                    curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
                }
           
                curl_multi_add_handle($mh, $curly[$id]);
            }
           
            // execute the handles
            $running = null;
            do {
                curl_multi_exec($mh, $running);
            } while($running > 0);
           
           
            // get content and remove handles
            foreach($curly as $id => $c) {
                if ($showhttpstatus){
                    $result[$id] = curl_getinfo($c, CURLINFO_HTTP_CODE);
                } else {
                    $result[$id] = curl_multi_getcontent($c);
                }    
                curl_multi_remove_handle($mh, $c);
            }
           
            // all done
            curl_multi_close($mh);
           
            return $result;
        }
    }
?>