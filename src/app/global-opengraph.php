<?php 
    //Data twitter
    if (!empty(Core::getInstance()->twitter)){
        $twittersite = Core::getInstance()->twitter;
        $twitterarray = explode('/',$twittersite);
        $twitterusername = end($twitterarray);
    }
    $created = date('Y-m-d',filemtime(basename(__FILE__)));
?>
<!-- Open Graphs -->
<link rel="author" href="<?php echo ((!empty(Core::getInstance()->gplus))?Core::getInstance()->gplus:'')?>"/>
    <link rel="publisher" href="<?php echo ((!empty(Core::getInstance()->gpub))?Core::getInstance()->gpub:'')?>"/>
    <meta itemprop="name" content="<?php echo $title?>">
    <meta itemprop="description" content="<?php echo $description?>">
    <meta itemprop="image" content="<?php echo $image?>">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $title?>" />
    <meta name="twitter:description" content="<?php echo $description?>" />
    <meta name="twitter:image" content="<?php echo $image?>" />
    <meta name="twitter:image:alt" content="<?php echo $title?>" />
    <meta name="twitter:site" content="<?php echo ((!empty(Core::getInstance()->twitter))?'@'.$twitterusername:'')?>">
    <meta name="twitter:creator" content="<?php echo ((!empty(Core::getInstance()->twitter))?'@'.$twitterusername:'')?>">
    <meta property="og:title" content="<?php echo $title?>" />
    <meta property="og:description" content="<?php echo $description?>" />
    <meta property="og:url" content="<?php echo ((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
    <meta property="og:image" content="<?php echo $image?>" />
    <meta property="og:site_name" content="<?php echo Core::getInstance()->title?>" />
    <meta property="og:type" content="website" />
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "dateCreated": "<?php echo $created?>",
  "url": "<?php echo ((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>",
  "name": "<?php echo $title?>",
  "description": "<?php echo $description?>",
  "image": {
    "@type": "ImageObject",
    "url": "<?php echo $image?>"
  },
  "potentialAction": {
    "@type": "SearchAction",
    "target": "<?php echo Core::getInstance()->basepath?>/blog/{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>