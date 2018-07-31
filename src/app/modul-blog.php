<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$search = filter_var((empty($_GET['search'])?'':$_GET['search']),FILTER_SANITIZE_STRING);
$page = filter_var((empty($_GET['page'])?'1':$_GET['page']),FILTER_SANITIZE_STRING);
$itemsperpage = filter_var((empty($_GET['itemsperpage'])?'10':$_GET['itemsperpage']),FILTER_SANITIZE_STRING);

//Get data pages
$url = Core::getInstance()->api.'/page/data/public/search/'.$page.'/'.$itemsperpage.'/?query='.rawurlencode($search).'&lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey;
$data = json_decode(Core::execGetRequest($url));

if (empty($search)){
    $title = Core::getInstance()->description.(!empty($page) && ($page != 1)?' | '.Core::lang('page').' '.$page:'').' | '.Core::getInstance()->title;
    $description = Core::getInstance()->description.(!empty($page)?' '.Core::lang('page').' '.$page:'').' | '.Core::getInstance()->title;
    $keyword = Core::getInstance()->keyword;
    $author = Core::getInstance()->title.' Team';
    $image = ((!empty(Core::getInstance()->assetspath))?Core::getInstance()->assetspath.'/images/background/megamenubg.jpg':'');
} else {
    $title = Core::lang('pages_meta_search').' '.$search.(!empty($page)?' | '.Core::lang('page').' '.$page:'').' | '.Core::getInstance()->title;
    $description = ''.Core::lang('pages_meta_search').' '.$search.(!empty($page)?' '.Core::lang('page').' '.$page:'');
    $keyword = ''.Core::lang('pages_meta_search_keyword').', '.$search;
    $author = Core::getInstance()->title.' Team';
    $image = ((!empty(Core::getInstance()->assetspath))?Core::getInstance()->assetspath.'/images/background/megamenubg.jpg':'');
}
?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <base href="<?php echo Core::getInstance()->basepath?>/">
    <?php include_once 'global-meta.php';?>    
    <title><?php echo $title?></title>
    <meta name="description" content="<?php echo $description?>">
    <meta name="keyword" content="<?php echo $keyword?>">
    <meta name="author" content="<?php echo $author?>">
    <?php include 'global-opengraph.php';?>
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
                        <li class="breadcrumb-item active"><?php echo Core::lang('blog')?></li>
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
                            
                                <div class="row">
                                    <div class="col-lg-8 col-md-12 p-20">
                                        <ul class="list-unstyled">
                                        <?php
                                            if (!empty($data)){
                                                if ($data->{'status'} == "success"){
                                                    $i=1;
                                                    foreach ($data->results as $name => $value) {
                                                        echo '<li class="media">
                                                            <div class="media-body">
                                                                <h3 class="mt-0 mb-1"><a href="post/'.$value->PageID.'/'.Core::convertToSlug($value->Title).'" title="'.$value->Title.'">'.$value->Title.'</a></h3>
                                                                <p class="text-muted">';
                                                                
                                                                $datatag = "";
                                                                foreach ($value->Tags as $namelabel => $valuelabel) {
                                                                    $datatag .= '<a href="blog/'.$valuelabel.'" title="'.Core::lang('pages_search_label').' '.$valuelabel.'">#'.$valuelabel.'</a>, ';
                                                                }
                                                                $datatag = substr($datatag, 0, -2);
                                                                echo $datatag;
                                                                echo ' | <i class="mdi mdi-calendar-clock"></i> '.date_format(date_create($value->Created_at),"d M Y, H:i").' | <i class="mdi mdi-account"></i> <a href="user/'.$value->User.'" title="'.Core::lang('profile').' '.$value->User.'">'.$value->User.'</a> | <i class="mdi mdi-eye"></i> '.$value->Viewer.'</p>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg">
                                                                        <p>
                                                                            <img class="img-fluid" src="'.$value->Image.'">
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-12">
                                                                        <p>
                                                                            '.$value->Description.'
                                                                        </p>
                                                                        <p><a href="post/'.$value->PageID.'/'.Core::convertToSlug($value->Title).'">'.Core::lang('pages_readmore').'</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>';
                                                    }
                                                } else {
                                                    echo '<div class="col-lg-12">'.Core::getMessage('secondary',"",Core::lang('pages_not_available')).'</div>';
                                                }
                                            } else {
                                                echo '<div class="col-lg-12">'.Core::getMessage('danger',Core::lang('core_not_connected')).'</div>';
                                            }
                                        ?>
                                            
                                        </ul>
                                    </div>

                                    <?php include 'modul-blog-sidebar.php';?>
                                </div>
                                <hr>
                                <?php
                                    if (!empty($data) && ($data->{'status'} == "success")){
                                        $pagination = new Pagination;
                                        echo $pagination->makePagination($data,Core::getInstance()->basepath.'/blog?search='.rawurlencode($search));
                                    }
                                ?>
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
    <script src="../assets/plugins/tagcloud/jquery.tagcloud.js"></script>
    <script>
        function getTrendingPosts(limits,show='all'){
            if(show != 'all') show = 'seasonal';
            $.ajax({
                url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/taxonomy/page/')?>")+show+'/'+limits+Crypto.decode("<?php echo base64_encode('/?lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey)?>")+"&_="+randomText(60),
                dataType: "json",
                type: "GET",
                success: function(data) {
                    if (data.status == "success"){
                        $('#trendingpost').append('<p class="text-muted m-t-5 m-b-5"><?php echo Core::lang('pages_widget_trendingposts')?></p><hr class="m-t-5 m-b-10">');
                        $.each(data.results, function(index, value){
                            $('#trendingpost').append('<a href="post/'+value.PageID+'/'+slugify(value.Title)+'" title="'+value.Title+'">'+value.Title+'</a>');
                            if (index < (data.results.length-1)) $('#trendingpost').append('<hr class="m-t-5 m-b-5">');
                        });
                        $('#trendingpost').append('<br><br>');
                    }
                },
                error: function(x, e) {}
            });  
        }

        function getTrendingTags(limits,show='all'){
            if(show != 'all') show = 'seasonal';
            $.ajax({
                url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/taxonomy/tags/')?>")+show+'/'+limits+Crypto.decode("<?php echo base64_encode('/?lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey)?>")+"&_="+randomText(60),
                dataType: "json",
                type: "GET",
                success: function(data) {
                    if (data.status == "success"){
                        $('#tagcloud').append('<p class="text-muted m-t-5 m-b-5"><?php echo Core::lang('pages_widget_trendingtags')?></p><hr class="m-t-5 m-b-10">');
                        $.each(data.results, function(index, value){
                            $('#tagcloud').append('<a href="blog/'+value.Tags.toLowerCase()+'" rel="'+value.Total+'">#'+value.Tags+'</a> ');
                        });
                        $('#tagcloud').append('<br><br>');
                    }
                },
                complete: function(){
                    $("#tagcloud a").tagcloud({
                        size: {start: 10, end: 25, unit: "px"}
                    });
                },
                error: function(x, e) {}
            });
        }

        /* onload event */
        $(function(){
            getTrendingPosts(5);
            getTrendingTags(15);
            /* This is for the sticky sidebar */
            $(".stickyside").stick_in_parent({
                offset_top: 100
            });
        });
    </script>
</body>

</html>
