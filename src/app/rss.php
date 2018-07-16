<?php include 'Core.php';
    header('Content-type: application/rss+xml');
    Core::startCache(18000,true);
    //Validasi param
    $page = filter_var((empty($_GET['page'])?'1':$_GET['page']),FILTER_SANITIZE_STRING);
    $itemsperpage = filter_var((empty($_GET['itemsperpage'])?'50':$_GET['itemsperpage']),FILTER_SANITIZE_STRING);
    
    //Get video
    $url = Core::getInstance()->api.'/page/data/public/published/'.$page.'/'.$itemsperpage.'/desc/?lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey;
    $data = json_decode(Core::execGetRequest($url));

    if (!empty($data)){
        if($data->{'status'} == "success"){
            echo '<?xml version="1.0" encoding="UTF-8"?>  
	                <rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">  
            	    <channel>
                        <atom:link href="'.((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" rel="self" type="application/rss+xml" />
                        <title>'.Core::lang('pages_meta_desc_latest').' '.Core::getInstance()->title.'</title>
                        <link>'.Core::getInstance()->basepath.'</link>
                        <description>'.Core::getInstance()->description.'</description>';
                        echo "\n";
            foreach ($data->results as $name => $value) {
                echo '<item>
                    <title>'.htmlspecialchars($value->{'Title'}, ENT_QUOTES).'</title>
                    <description><![CDATA['.$value->{'Description'}.']]></description>
                    <link>'.Core::getInstance()->basepath.'/post/'.$value->{'PageID'}.'/'.Core::convertToSlug($value->{'Title'}).'</link>
                    <guid>'.Core::getInstance()->basepath.'/post/'.$value->{'PageID'}.'/'.Core::convertToSlug($value->{'Title'}).'</guid>
                    <pubDate>'.date_format(date_create($value->{'Created_at'}), 'D, d M Y H:i:s O').'</pubDate>
                </item>';
                echo "\n";
            }
            echo '</channel>
                    </rss>';
        }
    }
    Core::endCache();
?>