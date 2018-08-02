<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('contact_us')?> - <?php echo Core::getInstance()->title?></title>
    <!-- summernotes CSS -->
    <link href="../assets/plugins/summernote/dist/summernote.css" rel="stylesheet"/>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('contact_us')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('contact_us')?></li>
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
                                        <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('form_contact_us')?></h3><hr>
                                        <?php if(empty(Core::getInstance()->recaptcha_sitekey) || empty(Core::getInstance()->recaptcha_secretkey)) echo Core::getMessage('danger',Core::lang('require_recaptcha_config'),'<br>'.Core::lang('get_recaptcha_config'));?>
                                        <div id="reportmsg"></div>
                                        <form class="form-control-line" id="contactForm">
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('subject')?></b></label>
                                                <input id="subject" type="text" placeholder="" class="form-control" maxlength="50" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('input_subject')?></small></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('message')?></b></label>
                                                <textarea id="message" type="text" style="resize: vertical;" rows="3" placeholder="" class="form-control summernote" maxlength="10000"></textarea>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('input_message')?></small></span>
                                            </div>
                                            <div id="g-recaptcha" class="g-recaptcha" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                            <hr>
                                            <div class="form-group">
                                                <button id="submitbtn" type="submit" class="btn btn-themecolor"><?php echo Core::lang('send_message')?> <i class="mdi mdi-send"></i></button>
                                            </div>                                        
                                        </form>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 p-20">
                                        <div class="stickyside">
                                        <?php
                                            echo '<div class="card card-body bg-light">
                                            <b>'.Core::getInstance()->title.'</b>
                                            <hr class="m-t-0 m-b-0" style="display:block;height: 1px;border: 0;border-top: 1px solid #ccc;margin: 1em 0;padding: 0;">
                                            '.Core::getInstance()->description;
                                            if (!empty(Core::getInstance()->facebook) || !empty(Core::getInstance()->twitter) || !empty(Core::getInstance()->gplus) || !empty(Core::getInstance()->email)){
                                                echo '<p class="m-t-10 m-b-0">';
                                                echo (!empty(Core::getInstance()->facebook)?'<a href="'.Core::getInstance()->facebook.'" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>':'');
                                                echo (!empty(Core::getInstance()->twitter)?' <a href="'.Core::getInstance()->twitter.'" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>':'');
                                                echo (!empty(Core::getInstance()->gplus)?' <a href="'.Core::getInstance()->gplus.'" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>':'');
                                                echo (!empty(Core::getInstance()->email)?' <a href="mailto:'.Core::getInstance()->email.'"><i class="fa fa-envelope-square fa-2x"></i></a>':'');
                                                echo '</p>';
                                            }
                                            echo '<small><p class="m-t-10 m-b-5">Powered by - <a href="https://github.com/aalfiann/reslim-ui-boilerplate" target="_blank">reSlim UI Boilerplate</a></p></small>';
                                            echo '</div>';
                                        ?>
                                        </div>
                                    </div>
                                </div>
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
    <!-- Summernote -->
    <script src="../assets/plugins/summernote/dist/summernote.min.js"></script>
    <?php 
        $codelang = "";
        switch(Core::getInstance()->setlang){
            case 'id':
                $codelang = 'id-ID';
                break;
            default:
                $codelang = "";
        }
        if (!empty($codelang)) echo '<script src="../assets/plugins/summernote/dist/lang/summernote-'.$codelang.'.min.js"></script>';
    ?>
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script>$(function(){$('head').append('<link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">')});</script>
    <script>
        /* onload event */
        $(function(){
            <?php 
                if(!empty(Core::getInstance()->recaptcha_sitekey) && !empty(Core::getInstance()->recaptcha_secretkey)){
                    echo '/* ajax send mail */
                    var contactForm = $("#contactForm");
                    contactForm.on("submit", function(e) {
                        $("#reportmsg").html("");
                        e.preventDefault();

                        /* Render reCaptcha */
                        var sourceapi = "https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit";
                        var len = $(\'script[src*="\'+sourceapi+\'"]\').length; 
                        if (len === 0) {
                            renderRecaptcha(sourceapi);
                            return false;
                            if ($(\'script[src*="\'+sourceapi+\'"]\').length === 0) {
                                renderRecaptcha(sourceapi);
                                return false;
                            }
                        }
        
                        disableClickButton("submitbtn");
                        $.ajax({
                            type: "POST",
                            url: "ajax-sendmail.php",
                            data: {
                                fullname: "'.$datalogin['username'].'",
                                email: $("#my_email_navbar").text(),
                                subject: $("#subject").val(),
                                message: $("#message").val(),
                                captcha: grecaptcha.getResponse()
                            },
                            success: function(data) {
                                if (data.status == "success"){
                                    /* clear form */
                                    contactForm.find("input,textarea").val("").end();
                                    $(".summernote").summernote("reset");
                                    writeMessage("#reportmsg","success",data.message);
                                    swal(data.message, "","success");
                                } else {
                                    writeMessage("#reportmsg","danger","'.Core::lang('send_message_failed').'",data.message);
                                    swal("'.Core::lang('send_message_failed').'", data.message,"error");
                                }
                            },
                            complete: function(){
                                grecaptcha.reset();
                                disableClickButton("submitbtn",false);
                            }
                        });
                    });';
                }
            ?>

            /* Load Summernote */
            $('.summernote').summernote({
                height: 150, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
                <?php echo (empty($codelang)?'':',lang: "'.$codelang.'"')."\n";?>
            });
            
            /* This is for the sticky sidebar */
            $(".stickyside").stick_in_parent({
                offset_top: 75
            });
        });
        
        <?php 
            if(!empty(Core::getInstance()->recaptcha_sitekey) && !empty(Core::getInstance()->recaptcha_secretkey)){
                echo '/* Render reCaptcha */
                function renderRecaptcha(url){
                    var dsq = document.createElement("script"); dsq.type = "text/javascript"; dsq.async = true; dsq.defer = true;
                    dsq.src = url;
                    (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(dsq);
                }
        
                /* Callback reCaptcha */
                var onloadCallback = function() {
                    grecaptcha.render("g-recaptcha", {
                        "sitekey" : "'.Core::getInstance()->recaptcha_sitekey.'",
                        "theme" : "light"
                    });
                };';
            }
        ?>
    </script>
</body>

</html>
