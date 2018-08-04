<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();
if(Core::getUserGroup() != '1') {Core::goToPage('modul-user-profile.php');exit;}?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('settings')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('settings')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('maintenance')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('settings')?></li>
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
                            if (isset($_POST['submitsettings']))
                            {
                                $post_array = array(
                                    'Title' => $_POST['title'],
                                    'Keyword' => $_POST['keyword'],
                                    'Description' => $_POST['description'],
                                    'Email' => $_POST['email'],
                                    'Basepath' => $_POST['basepath'],
                                    'Homepath' => $_POST['homepath'],
                                    'Assetspath' => $_POST['assetspath'],
                                    'Fixedpath' => $_POST['fixedpath'],
                                    'Api' => $_POST['api'],
                                    'ApiKey' => $_POST['apikey'],
                                    'Disqus' => $_POST['disqus'],
                                    'Sharethis' => $_POST['sharethis'],
                                    'Facebook' => $_POST['facebook'],
                                    'Twitter' => $_POST['twitter'],
                                    'Gplus' => $_POST['gplus'],
                                    'Gpub' => $_POST['gpub'],
                                    'Googleanalytics' => $_POST['googleanalytics'],
                                    'Googlewebmaster' => $_POST['googlewebmaster'],
                                    'Bingwebmaster' => $_POST['bingwebmaster'],
                                    'Yandexwebmaster' => $_POST['yandexwebmaster'],
                                    'Seopage' => $_POST['seopage'],
                                    'Seosite' => $_POST['seosite'],
                                    'Recaptcha_sitekey' => $_POST['recaptcha_sitekey'],
                                    'Recaptcha_secretkey' => $_POST['recaptcha_secretkey']
                                );
                                Core::saveSettings($post_array);
                            } 
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-control-line" action="<?php $_SERVER['PHP_SELF']?>" method="post">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"><?php echo Core::lang('data')?></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"><?php echo Core::lang('settings_server')?></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3" role="tab"><?php echo Core::lang('settings_analytics')?></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"><?php echo Core::lang('settings_others')?></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content m-t-20">
                                        <!--first tab-->
                                        <div class="tab-pane active" id="tab1" role="tabpanel">
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('title')?></b></label>
                                                <input name="title" placeholder="<?php echo Core::lang('input_title_website')?>" class="form-control" maxlength="20" value="<?php echo Core::getInstance()->title?>" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_title')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_keyword')?></b></label>
                                                <input name="keyword" type="text" placeholder="<?php echo Core::lang('input_settings_keyword')?>" class="form-control" maxlength="250" value="<?php echo Core::getInstance()->keyword?>" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_keyword')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_description')?></b></label>
                                                <textarea name="description" type="text" style="resize: vertical;" rows="5" placeholder="<?php echo Core::lang('input_settings_description')?>" class="form-control" maxlength="200" required><?php echo Core::getInstance()->description?></textarea>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_description')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_seopage')?></b></label>
                                                <textarea name="seopage" type="text" rows="5" style="resize: vertical;" placeholder="<?php echo Core::lang('input_settings_seopage')?>" class="form-control"><?php echo Core::getInstance()->seopage?></textarea>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_seopage')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_seosite')?></b></label>
                                                <textarea name="seosite" type="text" rows="5" style="resize: vertical;" placeholder="<?php echo Core::lang('input_settings_seosite')?>" class="form-control"><?php echo Core::getInstance()->seosite?></textarea>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_seosite')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('email_address')?></b></label>
                                                <input name="email" type="text" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$" placeholder="<?php echo Core::lang('input_email')?>" class="form-control" maxlength="50" value="<?php echo Core::getInstance()->email?>" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_email')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_facebook')?></b></label>
                                                <input name="facebook" type="text" placeholder="<?php echo Core::lang('input_settings_facebook')?>" class="form-control" value="<?php echo Core::getInstance()->facebook?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_facebook')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_twitter')?></b></label>
                                                <input name="twitter" type="text" placeholder="<?php echo Core::lang('input_settings_twitter')?>" class="form-control" value="<?php echo Core::getInstance()->twitter?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_twitter')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_gplus')?></b></label>
                                                <input name="gplus" type="text" placeholder="<?php echo Core::lang('input_settings_gplus')?>" class="form-control" value="<?php echo Core::getInstance()->gplus?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_gplus')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_gpub')?></b></label>
                                                <input name="gpub" type="text" placeholder="<?php echo Core::lang('input_settings_gpub')?>" class="form-control" value="<?php echo Core::getInstance()->gpub?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_gpub')?></small></span>
                                            </div>
                                        </div>

                                        <!--second tab-->
                                        <div class="tab-pane" id="tab2" role="tabpanel">
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_homepath')?></b></label>
                                                <input name="homepath" type="text" placeholder="<?php echo Core::lang('input_settings_homepath')?>" class="form-control" value="<?php echo Core::getInstance()->homepath?>" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_homepath')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('base_path')?></b></label>
                                                <input name="basepath" type="text" placeholder="<?php echo Core::lang('input_base_path')?>" class="form-control" value="<?php echo Core::getInstance()->basepath?>" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_basepath')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('assets_path')?></b></label>
                                                <input name="assetspath" type="text" placeholder="<?php echo Core::lang('input_assets_path')?>" class="form-control" value="<?php echo Core::getInstance()->assetspath?>" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_assetspath')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('url_api')?></b></label>
                                                <input name="api" type="text" placeholder="<?php echo Core::lang('input_url_api')?>" class="form-control" value="<?php echo Core::getInstance()->apiconfig?>" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_api')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('fixed_path')?></b></label>
                                                <input name="fixedpath" type="text" placeholder="<?php echo Core::lang('input_fixed_path')?>" class="form-control" value="<?php echo Core::getInstance()->fixedpath?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_fixedpath')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('api_key')?></b></label>
                                                <input name="apikey" type="text" placeholder="<?php echo Core::lang('input_api_key')?>" class="form-control" value="<?php echo Core::getInstance()->apikey?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('no_have_api')?> <a href="modul-data-api.php"><?php echo Core::lang('here')?></a></small></span>
                                            </div>
                                        </div>

                                        <!--third tab-->
                                        <div class="tab-pane" id="tab3" role="tabpanel">
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_googleanalytics')?></b></label>
                                                <input name="googleanalytics" type="text" placeholder="<?php echo Core::lang('input_settings_googleanalytics')?>" class="form-control" value="<?php echo Core::getInstance()->googleanalytics?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_googleanalytics')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_googlewebmaster')?></b></label>
                                                <input name="googlewebmaster" type="text" placeholder="<?php echo Core::lang('input_settings_googlewebmaster')?>" class="form-control" value="<?php echo Core::getInstance()->googlewebmaster?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_googlewebmaster')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_bingwebmaster')?></b></label>
                                                <input name="bingwebmaster" type="text" placeholder="<?php echo Core::lang('input_settings_bingwebmaster')?>" class="form-control" value="<?php echo Core::getInstance()->bingwebmaster?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_bingwebmaster')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_yandexwebmaster')?></b></label>
                                                <input name="yandexwebmaster" type="text" placeholder="<?php echo Core::lang('input_settings_yandexwebmaster')?>" class="form-control" value="<?php echo Core::getInstance()->yandexwebmaster?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_yandexwebmaster')?></small></span>
                                            </div>
                                        </div>

                                        <!--fourth tab-->
                                        <div class="tab-pane" id="tab4" role="tabpanel">
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_disqus')?></b></label>
                                                <input name="disqus" type="text" placeholder="<?php echo Core::lang('input_settings_disqus')?>" class="form-control" value="<?php echo Core::getInstance()->disqus?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_disqus')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_sharethis')?></b></label>
                                                <input name="sharethis" type="text" placeholder="<?php echo Core::lang('input_settings_sharethis')?>" class="form-control" value="<?php echo Core::getInstance()->sharethis?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_sharethis')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_recaptcha_sitekey')?></b></label>
                                                <input name="recaptcha_sitekey" type="text" placeholder="<?php echo Core::lang('input_settings_recaptcha_sitekey')?>" class="form-control" value="<?php echo Core::getInstance()->recaptcha_sitekey?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_recaptcha_sitekey')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('label_settings_recaptcha_secretkey')?></b></label>
                                                <input name="recaptcha_secretkey" type="text" placeholder="<?php echo Core::lang('input_settings_recaptcha_secretkey')?>" class="form-control" value="<?php echo Core::getInstance()->recaptcha_secretkey?>">
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_settings_recaptcha_secretkey')?></small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button name="submitsettings" type="submit" class="btn btn-themecolor"><?php echo Core::lang('save')?> <?php echo Core::lang('settings')?></button>
                                    </div>                                        
                                </form>

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
</body>

</html>
