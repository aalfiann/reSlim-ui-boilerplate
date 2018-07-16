<?php 

include 'Core.php';

function autoFixURL($url){
    $url = trim($url);
    if(substr($url, 0, 2) == "//"){
        return $url = ((Core::isHttpsButtflare()) ? 'https://' : 'http://').substr($url,2);
    } else if (substr($url, 0, 7) == 'http://' ) {
        return $url;
    } else if (substr($url, 0, 8) == 'https://' ) {
        return $url;
    }
    return Core::getInstance()->basepath.'/'.$url;
}

function generateMenuJsonSitemap($menujson){
    $result = '<?xml version="1.0" encoding="UTF-8"?>
                <urlset
                    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\n";
    if(empty($menujson)) return $result.'</urlset>';
    $menu = json_decode($menujson);
    if(json_last_error() != JSON_ERROR_NONE) return $result.'</urlset>';
    foreach($menu->menu as $menuval){
        foreach($menuval->subheader as $subvalue){
            $dataresult='';
            if(!empty($subvalue->menus) && empty($subvalue->link)) {
                $n=0;
                $menuli='';
                foreach($subvalue->menus as $menuvalue){
                    if (!empty($menuvalue->submenus)){
                        $sn=0;
                        $menulisub='';
                        foreach ($menuvalue->submenus as $menuvaluesub){
                            $menulisub .= '<url>'."\n".'<loc>'.autoFixURL($menuvaluesub->link).' </loc>'."\n".'</url>'."\n";
                            $sn++;
                        }
                        $menuli .= $menulisubs;
                    } else {
                        $menuli .= '<url>'."\n".'<loc>'.autoFixURL($menuvalue->link).' </loc>'."\n".'</url>'."\n";
                    }
                    $n++;
                }
                $dataresult .= $menuli;
            } else {
                $dataresult .= '<url>'."\n".'<loc>'.autoFixURL($subvalue->link).'</loc>'."\n".'</url>'."\n";
            }
            
            $result .= $dataresult;
        } 
    }
    $result .= '</urlset>';
    return $result;
}
header('Content-type: application/xml');
echo generateMenuJsonSitemap(file_get_contents('menu.public.json'));