<?php include 'Core.php';
    header('Content-type: application/xml');

    echo '<?xml version="1.0" encoding="UTF-8"?>
    <urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\n\n";
?>
        <url>
            <loc>
                <?php echo Core::getInstance()->basepath?>/sitemap.xml
            </loc>
            <changefreq>daily</changefreq>
        </url>
<?php echo "\n".'</urlset>';?>