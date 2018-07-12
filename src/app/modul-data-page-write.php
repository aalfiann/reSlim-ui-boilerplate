<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('create_page')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><a href="modul-data-page.php"><i class="mdi mdi-arrow-left"></i> <?php echo Core::lang('data_page')?></a></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('extension')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('data_page')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('create_page')?></li>
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
                        <div id="report-newdata"></div>
                        <div class="card">
                            <div class="card-body">
                            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('create_page')?></h3><hr>
                                <form id="addnewdata" class="form-control-line" action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('image')?></b></label>
                                                <input type="text" id="image" class="form-control" placeholder="<?php echo Core::lang('input_image_page')?>" maxlength="250" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_page_image')?></small></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label"><b><?php echo Core::lang('tags')?></b></label>
                                                <input type="text" id="tags" class="form-control" placeholder="<?php echo Core::lang('input_tags_page')?>" maxlength="200" required>
                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_page_tags')?></small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="form-control-label"><b><?php echo Core::lang('title')?></b></label>
                                        <input type="text" id="title" class="form-control" placeholder="<?php echo Core::lang('input_title_page')?>" maxlength="100" required>
                                        <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_page_title')?></small></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><b><?php echo Core::lang('description')?></b></label>
                                        <textarea id="description" rows="2" style="resize: vertical;" class="form-control" placeholder="<?php echo Core::lang('input_description_page')?>" maxlength="200" required></textarea>
                                        <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('helper_page_description')?></small></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><b><?php echo Core::lang('content')?></b></label>
                                        <textarea id="content" rows="5" style="resize: vertical;" class="form-control summernote" placeholder="<?php echo Core::lang('input_content_page')?>" maxlength="10000" required></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button id="submitbtn" type="submit" class="btn btn-success"><?php echo Core::lang('save_page')?></button>
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
    <script src="../assets/plugins/summernote/dist/summernote.min.js"></script>
    <script>
        $(function(){
            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
        });
        /* Add new data start */

        $("#addnewdata").on("submit",sendnewdata);
        function sendnewdata(e){
            console.log("Process add new data...");
            e.preventDefault();
            var that = $(this);
            that.off("submit"); /* remove handler */
            var div = document.getElementById("report-newdata");
            var btn = "submitbtn";
            disableClickButton(btn);
                $.ajax({
                    url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/data/new')?>"),
                    data : {
                        Username: "<?php echo $datalogin['username']?>",
                        Token: "<?php echo $datalogin['token']?>",
                        Title: $("#title").val(),
                        Image: $("#image").val(),
                        Description: $("#description").val(),
                        Content: $("#content").val(),
                        Tags: $("#tags").val()  
                    },
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        div.innerHTML = "";
                        if (data.status == "success"){
                            div.innerHTML = messageHtml("success","<?php echo Core::lang('core_process_add').' '.Core::lang('page').' '.Core::lang('status_success')?>");
                            /* clear from */
                            $("#addnewdata")
                            .find("input,textarea")
                            .val("")
                            .end()
                            .find("input[type=checkbox]")
                            .prop("checked", "")
                            .end();
                            $(".summernote").summernote("code", "");
                            console.log("<?php echo Core::lang('core_process_add').' '.Core::lang('page').' '.Core::lang('status_success')?>");
                            that.on("submit", sendnewdata); /* add handler back after ajax */
                        } else {
                            div.innerHTML = messageHtml("danger","<?php echo Core::lang('core_process_add').' '.Core::lang('page').' '.Core::lang('status_failed')?>",data.message);
                            that.on("submit", sendnewdata); /* add handler back after ajax */
                        }
                    },
                    complete: function() {
                        disableClickButton(btn,false);
                    },
                    error: function(x, e) {}
                });
        }
        /* Add new data end */
    </script>
</body>

</html>
