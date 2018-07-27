<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$username = (!empty($_GET['username'])?$_GET['username']:'');
//Get data profile
$url = Core::getInstance()->api.'/user/profile/'.$username.'/?lang='.Core::getInstance()->setlang.'&apikey='.Core::getInstance()->apikey;
$data = json_decode(Core::execGetRequest($url));

$avatar = Core::getInstance()->assetspath.'/images/users/no-pic.jpg';
$profilename = $username;
$description = Core::lang('no_description_profile');
$imagecompany = ((!empty(Core::getInstance()->assetspath))?Core::getInstance()->assetspath.'/images/background/megamenubg.jpg':'');
$datepublish = '';
$datemodified = '';
if (!empty($data) && $data->{'status'} == "success"){
    $description = (!empty($data->result[0]->Aboutme)?$data->result[0]->Aboutme:Core::lang('no_description_profile'));
    $profilename = ((empty($data->result[0]->Fullname) || $data->result[0]->Username == $data->result[0]->Fullname)?$data->result[0]->Username:$data->result[0]->Fullname);
    $avatar = (empty($data->result[0]->Avatar)?Core::getInstance()->assetspath.'/images/users/no-pic.jpg':$data->result[0]->Avatar);
    $datepublish = $data->result[0]->Created_at;
    $datemodified = (!empty($data->result[0]->Updated_at)?$data->result[0]->Updated_at:$datepublish);
}
$keyword = Core::lang('data').', '.Core::lang('profile').', '.Core::lang('user').', '.$profilename;
$title = Core::lang('profile').' '.$profilename;
?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <base href="<?php echo Core::getInstance()->basepath?>/">
    <?php include_once 'global-meta.php';?>    
    <title><?php echo $title?> - <?php echo Core::getInstance()->title?></title>
    <meta name="description" content="<?php echo $description?>">
    <meta name="keyword" content="<?php echo $keyword?>">
    <meta name="author" content="<?php echo $profilename?>">

    <!-- Open Graphs -->
    <link rel="author" href="<?php echo ((!empty(Core::getInstance()->gplus))?Core::getInstance()->gplus:'')?>"/>
    <link rel="publisher" href="<?php echo ((!empty(Core::getInstance()->gpub))?Core::getInstance()->gpub:'')?>"/>
    <meta itemprop="name" content="<?php echo $title?>">
    <meta itemprop="description" content="<?php echo $description?>">
    <meta itemprop="image" content="<?php echo $avatar?>">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $title?>" />
    <meta name="twitter:description" content="<?php echo $description?>" />
    <meta name="twitter:image" content="<?php echo $avatar?>" />
    <meta name="twitter:image:alt" content="<?php echo $title?>" />
    <meta name="twitter:site" content="<?php echo ((!empty(Core::getInstance()->twitter))?'@'.$twitterusername:'')?>">
    <meta name="twitter:creator" content="<?php echo ((!empty(Core::getInstance()->twitter))?'@'.$twitterusername:'')?>">
    <meta property="og:title" content="<?php echo $title?>" />
    <meta property="og:description" content="<?php echo $description?>" />
    <meta property="og:url" content="<?php echo ((Core::isHttpsButtflare()) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
    <meta property="og:image" content="<?php echo $avatar?>" />
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
            "name": "<?php echo $profilename?>"
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
            "url": "<?php echo $avatar?>"
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
                    <h3 class="text-themecolor"><?php echo Core::lang('profile').' : '.$profilename?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('blog')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('profile')?></a></li>
                        <li class="breadcrumb-item active"><?php echo $profilename?></li>
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
                <div id="report-changepass"></div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php 
                    if (!empty($data)){
                        if ($data->{'status'} == "success"){
                            echo '<!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center class="m-t-30"> <img src="'.$avatar.'" class="img-circle" width="150" />
                                                <h4 class="card-title m-t-10">'.$data->result[0]->Username.'</h4>
                                                '.((empty($data->result[0]->Fullname) || $data->result[0]->Username == $data->result[0]->Fullname)?'':'<h5 class="card-subtitle m-t-10">[ '.$data->result[0]->Fullname.' ]</h5>').'
                                                <h6 class="card-subtitle"><a href="mailto:'.$data->result[0]->Email.'">'.$data->result[0]->Email.'</a></h6>
                                            </center>
                                        </div>
                                        <div class="card-body"> 
                                            <hr>
                                            <small class="text-muted p-t-10 db">'.Core::lang('registered').'</small>
                                            <h4>'.date_format(date_create($data->result[0]->Created_at),"d M Y, H:i").'</h4>
                                            
                                            '.(!empty($data->result[0]->Updated_at)?'<small class="text-muted p-t-10 db">'.Core::lang('last_updated').'</small>
                                            <h4>'.date_format(date_create($data->result[0]->Updated_at),"d M Y, H:i").'</h4>':'').'
                                            <hr>
                                            <small class="text-muted">'.Core::lang('total').' '.Core::lang('post').' : </small>
                                            <h4 id="totalpost" class="pull-right">0</h4> 

                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                
                                <!-- Column -->
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs profile-tab" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">'.Core::lang('description').'</a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#mypost" role="tab">'.Core::lang('post').'</a> </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <!--first tab-->
                                            <div class="tab-pane active" id="profile" role="tabpanel">
                                                <div class="card-body">
                                                    <p class="m-t-10">'.(!empty($data->result[0]->Aboutme)?$data->result[0]->Aboutme:Core::lang('no_description_profile')).'</p>
                                                </div>
                                            </div>

                                            <!--second tab-->
                                            <div class="tab-pane" id="mypost" role="tabpanel">
                                                <div class="card-body">
                                                    <ul id="mylist" class="list-unstyled"></ul>
                                                    <center><button id="loadbtn" type="button" class="btn btn-themecolor" onclick="loadPost();">'.Core::lang('loadmore').'</button></center>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    

                                </div>
                                <!-- Column -->
                            </div>
                            <!-- Row -->';
                        } else {
                            echo '<div class="row page-titles">
                                <div class="col-md-5 col-8 align-self-center">
                                    <h3 class="text-themecolor m-b-0 m-t-0">'.Core::lang('message').':</h3>
                                    <p class="text-muted">'.$data->{'message'}.'</p>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<div class="row page-titles">
                        <div class="col-md-5 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0">'.Core::lang('message').':</h3>
                            <p class="text-muted">'.Core::lang('core_not_connected').'</p>
                        </div>
                    </div>';
                    }?>
                
                
                
                    
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
    <script>
        /* Custom Format Date */
        function customFormatDate(date='',delimiterdate='-',displaytime=false,midspace=' ',delimitertime=':') {
        if (date == '' || date == null){
    		date = new Date();
	    } else {
		    date = new Date(date);	
    	}
  
        var monthNames = [
            "Jan", "Feb", "Mar",
            "Apr", "May", "Jun", "Jul",
            "Aug", "Sep", "Oct",
            "Nov", "Dec"
        ];

        var dd = date.getDate().toString();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();
  
        var hh = date.getHours().toString();
        var mm = date.getMinutes().toString();
        var ss = date.getSeconds().toString();
  
        var ddChars = dd.split('');
        var hhChars = hh.split('');
        var mmChars = mm.split('');
        var ssChars = ss.split('');
        if (displaytime==false){
            return (ddChars[1]?dd:"0"+ddChars[0]) + delimiterdate + monthNames[monthIndex] + delimiterdate + year;		
        }
        return (ddChars[1]?dd:"0"+ddChars[0]) + delimiterdate + monthNames[monthIndex] + delimiterdate + year + midspace +(hhChars[1]?hh:"0"+hhChars[0])+delimitertime+(mmChars[1]?mm:"0"+mmChars[0])+delimitertime+(ssChars[1]?ss:"0"+ssChars[0]);
    }

        /* Initial page for loadmore */
        var pages = 1;
        /* Initial item for loadmore */
        var items = 3;

        /* Load more Post */
        function loadPost(){
            $(function(){
                var btn = "loadbtn";
                disableClickButton(btn);
                $.ajax({
                    url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/data/written/public/'.$username)?>")+"/"+pages+"/"+items+"/desc/?lang=<?php echo Core::getInstance()->setlang?>&apikey=<?php echo Core::getInstance()->apikey?>&query=&_="+randomText(10),
                    dataType: "json",
                    type: "GET",
                    success: function(data) {
                        if (data.status == "success"){
                            if(pages == 1) $('#totalpost').html(data.metadata.records_total);
                            if( pages <= data.metadata.page_total){
                                $.each(data.results, function(index, value){
                                    var tags = value.Tags.split(',');
                                    var datatags = "";
                                    $.each(tags, function(indextag, valuetag){
                                        datatags += '<a href="blog/'+slugify(valuetag)+'" title="<?php echo Core::lang('pages_search_label')?> '+$.trim(valuetag)+'">#'+$.trim(valuetag)+'</a>, ';
                                    });
                                    $('#mylist').append('<li class="media">\
                                            <div class="media-body">\
                                                <h3 class="mt-0 mb-1"><a href="post/'+value.PageID+'/'+slugify(value.Title)+'" title="'+value.Title+'">'+value.Title+'</a></h3>\
                                                <p class="text-muted">\
                                                    '+datatags.slice(0,-2)+' | <i class="mdi mdi-calendar-clock"></i> '+customFormatDate(value.Created_at,' ',true,', ')+'\
                                                </p><hr>\
                                                '+value.Description+'\
                                            </div>\
                                        </li>');
                                });
                                if(pages == data.metadata.page_total) $('#loadbtn').hide();
                                pages = pages+1;
                            }                                                     
                        } else {
                            $('#mylist').append('<li class="media">\
                                    <div class="media-body">\
                                        <span class="text-muted">'+data.message+'</span>\
                                    </div>\
                                </li>');
                            $('#loadbtn').hide();
                        }
                    },
                    complete: function(){
                        disableClickButton(btn,false);
                    },
                    error: function(x, e) {}
                });
            });
        }
        /* Load Post */
        loadPost(pages,items);
    </script>
</body>

</html>
