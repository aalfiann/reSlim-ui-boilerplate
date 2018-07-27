<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$pageid = filter_var((empty($_GET['id'])?'1':$_GET['id']),FILTER_SANITIZE_STRING);

//Get data pages
$url = Core::getInstance()->api.'/page/data/public/read/'.$pageid.'/?lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey;
$data = json_decode(Core::execGetRequest($url));

if (!empty($data)){
    if ($data->{'status'} == "success"){
        $title = $data->result[0]->Title.' | '.Core::getInstance()->title;
        $description = $data->result[0]->Description;
        $keyword = $data->result[0]->Tags_inline;
        $datepublish = $data->result[0]->Created_at;
        $datemodified = (!empty($data->result[0]->Updated_at)?$data->result[0]->Updated_at:$datepublish);
        $author = $data->result[0]->User;
        $image = (!empty($data->result[0]->Image)?$data->result[0]->Image:'');
        $imagecompany = ((!empty(Core::getInstance()->assetspath))?Core::getInstance()->assetspath.'/images/background/megamenubg.jpg':'');
    } else {
        $title = '404 - '.Core::lang('not_found').' | '.Core::getInstance()->title;
        $description = Core::lang('pages_meta_desc_page_not_found');
        $keyword = Core::getInstance()->keyword;
        $datepublish = '';
        $datemodified = '';
        $author = Core::getInstance()->title.' Team';
        $image = '';
        $imagecompany = ((!empty(Core::getInstance()->assetspath))?Core::getInstance()->assetspath.'/images/background/megamenubg.jpg':'');
    }
} else {
    $title = '404 - '.Core::lang('not_found').' | '.Core::getInstance()->title;
    $description = Core::lang('pages_meta_desc_page_not_found');
    $keyword = Core::getInstance()->keyword;
    $datepublish = '';
    $datemodified = '';
    $author = Core::getInstance()->title.' Team';
    $image = '';
    $imagecompany = ((!empty(Core::getInstance()->assetspath))?Core::getInstance()->assetspath.'/images/background/megamenubg.jpg':'');
}

//Data twitter
if (!empty(Core::getInstance()->twitter)){
    $twittersite = Core::getInstance()->twitter;
    $twitterarray = explode('/',$twittersite);
    $twitterusername = end($twitterarray);
}
$created = date('Y-m-d',filemtime(basename(__FILE__)));
?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <base href="<?php echo Core::getInstance()->basepath?>/">
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('post')?> - <?php echo Core::getInstance()->title?></title>
    <meta name="description" content="<?php echo $description;?>">
    <meta name="keyword" content="<?php echo $keyword;?>">
    <meta name="author" content="<?php echo $author;?>">
    
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
        "@type": "NewsArticle",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php echo ((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>"
        },
        "headline": "<?php echo $title ?>",
        "datePublished": "<?php echo $datepublish ?>",
        "dateModified": "<?php echo $datemodified ?>",
        "author": {
            "@type": "Person",
            "name": "<?php echo $author?>"
        },
        "publisher": {
            "@type": "Organization",
            "name": "<?php echo Core::getInstance()->title?>",
            "logo": {
                "@type": "ImageObject",
                "url": "<?php echo $imagecompany?>"
            }
        },
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
</head>

<body class="fix-sidebar fix-header card-no-border">
    <?php include_once 'global-preloader.php';?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include_once 'navbar-header.php';?>
        <?php include_once 'sidebar-left.php';?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><a href="blog"><?php echo Core::lang('blog')?></a></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('blog')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('post')?></li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <?php if(!empty(Core::getInstance()->sharethis)){
                                echo '<div class="sharethis-inline-share-buttons"></div><hr>';
                            }
                            ?>
                                <div class="row">
                                    <div class="col-lg-8 col-md-12 p-20">
                                        <ul class="list-unstyled">
                                        <?php
                                            if (!empty($data)){
                                                if ($data->{'status'} == "success"){
                                                    $i=1;
                                                    foreach ($data->result as $name => $value) {
                                                        echo '<li class="media">
                                                            <div class="media-body">
                                                                <h1 class="mt-0 mb-1"><a href="'.((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" title="'.$value->Title.'">'.$value->Title.'</a></h1>
                                                                <p class="text-muted">';
                                                                
                                                                $datatag = "";
                                                                foreach ($value->Tags as $namelabel => $valuelabel) {
                                                                    $datatag .= '<a href="blog/'.$valuelabel.'" title="'.Core::lang('pages_search_label').' '.$valuelabel.'">#'.$valuelabel.'</a>, ';
                                                                }
                                                                $datatag = substr($datatag, 0, -2);
                                                                echo $datatag;
                                                                echo ' | <i class="mdi mdi-calendar-clock"></i> '.date_format(date_create($value->Created_at),"d M Y, H:i").' | <i class="mdi mdi-account"></i> <a href="user/'.$value->User.'" title="'.Core::lang('profile').' '.$value->User.'">'.$value->User.'</a></p>
                                                                <hr>
                                                                '.$value->Content.'
                                                                '.(!empty(Core::getInstance()->disqus)?'<hr>
                                                                <button id="show-comments" class="btn btn-themecolor btn-block">'.Core::lang('pages_show_comments').'</button>
                                                                <div id="disqus_thread" class="text-themecolor"></div>
                                                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" title="Please enable JavaScript to view the comments">comments.</a></noscript>':'').'
                                                            </div>
                                                        </li>';
                                                    }
                                                } else {
                                                    echo '<div class="col-lg-12">'.Core::getMessage('danger',"",Core::lang('pages_not_found')).'</div>';
                                                }
                                            } else {
                                                echo '<div class="col-lg-12">'.Core::getMessage('danger',Core::lang('core_not_connected')).'</div>';
                                            }
                                        ?>
                                            
                                        </ul>
                                    </div>

                                    <?php include 'modul-blog-sidebar.php';?>
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <?php include_once 'sidebar-right.php';?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include_once 'global-footer.php';?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include_once 'global-js.php';?>
    <?php 
        if (!empty($data) && $data->status = "success"){
            echo '<script>';
            if(!empty(Core::getInstance()->disqus)){
                echo '
                    /* Disqus onclick start */
                    var disqus_loaded = false;
                    $("#show-comments").on("click",function(){
                        disqus();
                    });
                    function disqus() {
                        if (!disqus_loaded)  {
                            disqus_loaded = true;
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            var disqus_config = function () {
                                this.page.url = "'.((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'";  /* Replace PAGE_URL with your page\'s canonical URL variable */
                                this.page.identifier = "'.(!empty($pageid)?$pageid:$_SERVER['REQUEST_URI']).'"; /* Replace PAGE_IDENTIFIER with your page\'s unique identifier variable */
                            };
                            var d = document, s = d.createElement("script");
                            s.src = "https://'.Core::getInstance()->disqus.'.disqus.com/embed.js";
                            s.setAttribute("data-timestamp", +new Date());
                            (d.head || d.body).appendChild(s);
                            $("#show-comments").fadeOut();
                        }
                    }
                    /* Disqus onclick end */';
            }

            if(!empty(Core::getInstance()->sharethis)){
                echo '/* Sharethis start */
                var sthis=document.createElement("script");
                sthis.type="text/javascript";
                sthis.src="//platform-api.sharethis.com/js/sharethis.js#property='.Core::getInstance()->sharethis.'&product=inline-share-buttons";
                sthis.setAttribute("async", "");
                var st=document.getElementsByTagName("script")[0]; st.parentNode.insertBefore(sthis,st);
                /* Sharethis end */';
            }
            echo '</script>';
         }?>
</body>

</html>
