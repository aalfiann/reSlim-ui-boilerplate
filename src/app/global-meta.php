<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Core::getInstance()->assetspath?>/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Core::getInstance()->assetspath?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Theme Color -->
    <meta name="theme-color" content="#1976d2">
    <!-- Additional -->
    <link rel="canonical" href="<?php echo ((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
    <link rel="alternate" href="<?php echo ((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" hreflang="<?php echo Core::getInstance()->setlang?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS Feed <?php echo Core::getInstance()->title?>" href="<?php echo Core::getInstance()->basepath?>/rss.php" />
    <link rel="alternate" type="application/xml" title="Sitemap <?php echo Core::getInstance()->title?>" href="<?php echo Core::getInstance()->basepath?>/sitemap.xml" />
    <!-- Site Verification -->
    <meta name="google-site-verification" content="<?php echo Core::getInstance()->googlewebmaster?>" />
    <meta name="msvalidate.01" content="<?php echo Core::getInstance()->bingwebmaster?>"/>
    <meta name="yandex-verification" content="<?php echo Core::getInstance()->yandexwebmaster?>"/>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->