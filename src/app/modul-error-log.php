<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();
if(Core::getUserGroup() != '1') {Core::goToPage('modul-user-profile.php');exit;}?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('error_log')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('error_log')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('maintenance')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('error_log')?></li>
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
                        <?php
                            if (isset($_POST['clearlog'])){
                                $data = json_decode(Core::execGetRequest(Core::getInstance()->api.'/logs/data/clear/'.$datalogin['username'].'/'.$datalogin['token']));
                                if (!empty($data)){
                                    if ($data->{'status'} == "success"){
                                        echo '<div class="col-lg-12">';
                                        echo Core::getMessage('success',Core::lang('core_clear_log_success'));
                                        echo '</div>';
                                    } else {
                                        echo '<div class="col-lg-12">';
                                        echo Core::getMessage('danger',Core::lang('core_clear_log_failed'),$data->{'message'});
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<div class="col-lg-12">';
                                    echo Core::getMessage('danger',Core::lang('core_clear_log_failed'),Core::lang('core_not_connected'));
                                    echo '</div>';
                                }
                            } 
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('error_log_title')?></h3><hr>
                                <h6 class="card-subtitle"><?php echo Core::lang('error_log_description')?></h6>
                                <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
                                    <div class="form-group">
                                        <?php 
                                            if (!empty(Core::getInstance()->api)){
                                                $urlarray = explode("/",Core::getInstance()->api);
                                                array_pop($urlarray);
                                                $urlhost = implode('/', $urlarray);
                                                $url = $urlhost.'/logs/app.log';
                                            }
                                            echo '<textarea id="textarea_1" name="content" class="form-control" rows="20" >'.(!empty($url)?Core::execGetRequest($url):'').'</textarea>';
                                        ?>
                                    </div>
                                    <hr>
                                    <div class="form-group text-center">
                                        <button name="clearlog" type="submit" class="btn btn-danger"><?php echo Core::lang('clear_log')?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
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
    <!-- Edit_area -->
	<script language="javascript" type="text/javascript" src="../assets/plugins/edit_area/edit_area_full.js"></script>
   <script language="javascript" type="text/javascript">
    editAreaLoader.init({
	    id : "textarea_1",
	    start_highlight: false,	
	    allow_resize: "y",
    	allow_toggle: true,
        word_wrap: false,
        show_line_colors: true,
	    language: "<?php echo Core::getInstance()->setlang?>",
    	syntax: "html"
    });
 	</script>
</body>

</html>
