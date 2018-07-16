<?php include 'Core.php';
    header('Content-type: application/xml');
    Core::startCache(18000,true);
    //Validasi param
    $page = filter_var((empty($_GET['page'])?'1':$_GET['page']),FILTER_SANITIZE_STRING);
    $itemsperpage = filter_var((empty($_GET['itemsperpage'])?'1000':$_GET['itemsperpage']),FILTER_SANITIZE_STRING);
    
    //Get post
    $url = Core::getInstance()->api.'/page/data/public/published/'.$page.'/'.$itemsperpage.'/asc/?lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey;
    $data = json_decode(Core::execGetRequest($url));

    echo '<?xml version="1.0" encoding="UTF-8"?>
                <sitemapindex
                    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

    if (!empty($data)){
        if($data->{'status'} == "success"){
            for ($x = 1; $x <= $data->metadata->{'page_total'}; $x++) {
                echo '<sitemap>
                    <loc>'.Core::getInstance()->basepath.'/sitemap-post-'.$x.'.xml</loc>
                </sitemap>';
            }
        }
    }
?>
        <sitemap>
            <loc><?php echo Core::getInstance()->basepath?>/sitemap-menu.xml</loc>
        </sitemap>
        
        <sitemap>
            <loc><?php echo Core::getInstance()->basepath?>/sitemap-static.xml</loc>
        </sitemap>

    </sitemapindex>
<?php Core::endCache();?>