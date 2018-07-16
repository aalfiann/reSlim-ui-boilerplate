<?php include 'Core.php';
    header('Content-type: application/xml');
    Core::startCache(18000,true);
    //Validasi param
    $page = filter_var((empty($_GET['page'])?'1':$_GET['page']),FILTER_SANITIZE_STRING);
    $itemsperpage = filter_var((empty($_GET['itemsperpage'])?'1000':$_GET['itemsperpage']),FILTER_SANITIZE_STRING);
    
    //Get video
    $url = Core::getInstance()->api.'/page/data/public/published/'.$page.'/'.$itemsperpage.'/asc/?lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey;
    $data = json_decode(Core::execGetRequest($url));

    if (!empty($data)){
        if($data->{'status'} == "success"){
            echo '<?xml version="1.0" encoding="UTF-8"?>
                <urlset
                    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
            foreach ($data->results as $name => $value) {
                echo '<url>
                    <loc>'.Core::getInstance()->basepath.'/post/'.$value->{'PageID'}.'/'.Core::convertToSlug($value->{'Title'}).'</loc>
                    '.((empty($value->{'Updated_at'}))?'':'<lastmod>'.date_format(date_create($value->{'Updated_at'}), 'Y-m-d').'</lastmod>').'
                    <changefreq>daily</changefreq>
                </url>';
            }
            echo '</urlset>';
        }
    }
    Core::endCache();
?>