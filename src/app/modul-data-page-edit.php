<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('edit').' '.Core::lang('page')?> - <?php echo Core::getInstance()->title?></title>
    <!-- summernotes CSS -->
    <link href="<?php echo Core::getInstance()->assetspath?>/plugins/summernote/dist/summernote.css" rel="stylesheet"/>
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
                        <li class="breadcrumb-item active"><?php echo Core::lang('edit').' '.Core::lang('page')?></li>
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
                        <div id="report-updatedata"></div>
                        <div class="card">
                            <div class="card-body">
                            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('edit').' '.Core::lang('page')?></h3><hr>
                                <form id="updatedata" class="form-control-line" action="#">
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
                                        <textarea id="content" rows="5" style="resize: vertical;" class="form-control summernote" placeholder="<?php echo Core::lang('input_content_page')?>" maxlength="10000"></textarea>
                                    </div>
                                    <?php if(Core::getUserGroup()<3){
                                        echo '<div class="form-group">
                                                <label class="form-control-label"><b>'.Core::lang('status').'</b></label>
                                                <select id="status" type="text" class="form-control" onfocus="this.size=5;" onblur="this.size=1;" onchange="this.size=1; this.blur();">
                                                </select>
                                        </div>';
                                    }?>
                                    
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button id="updatebtn" type="submit" class="btn btn-success"><?php echo Core::lang('update_page')?></button>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <?php if(Core::getUserGroup()<3){
                                                echo '<button id="deletebtn" onclick="deletedata(\''.$_GET['pageid'].'\');return false;" type="submit" class="btn btn-danger">'.Core::lang('delete').' '.Core::lang('page').'</button>';
                                            }?>
                                        </div>
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
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/summernote/dist/summernote.min.js"></script>
    <?php 
        $codelang = "";
        switch(Core::getInstance()->setlang){
            case 'id':
                $codelang = 'id-ID';
                break;
            default:
                $codelang = "";
        }
        if (!empty($codelang)) echo '<script src="'.Core::getInstance()->assetspath.'/plugins/summernote/dist/lang/summernote-'.$codelang.'.min.js"></script>';
    ?>
    <script>
        $(function(){
            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
                <?php echo (empty($codelang)?'':',lang: "'.$codelang.'"')."\n";?>
            });

            /* Get data page start */
            $.ajax({
        	    type: "GET",
				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/data/read/'.$_GET['pageid'].'/'.$datalogin['username'].'/'.$datalogin['token'])?>"),
				dataType: 'json',
                cache: false,
				success: function( data ) {
                    document.getElementById("image").value='';
                    document.getElementById("tags").value='';
					document.getElementById("title").value='';
					document.getElementById("description").value='';
                    $(".summernote").summernote("code", "");
					if(data.status=='success'){
                        document.getElementById("image").value=data.result[0].Image;
                        document.getElementById("tags").value=data.result[0].Tags;
	        			document.getElementById("title").value=data.result[0].Title;
				    	document.getElementById("description").value=data.result[0].Description;
                        $(".summernote").summernote("code", data.result[0].Content);
                        <?php echo ((Core::getUserGroup()<3)?'getStatusOption(data.result[0].StatusID);':'')?>
					} else {
						document.getElementById("image").value='';
                        document.getElementById("tags").value='';
	    				document.getElementById("title").value='';
		    			document.getElementById("description").value='';
                        $(".summernote").summernote("code", "");
                        var div = document.getElementById("report-updatedata");
                        div.innerHTML = messageHtml("danger",data.message);
                        $("#updatedata")
                            .find("button[type=submit]")
                            .attr("disabled", "disabled")
                            .end();
					}
				},
				error: function( xhr, textStatus, error ) {
        		    console.log("XHR: " + xhr.statusText);
            	    console.log("STATUS: "+textStatus);
	                console.log("ERROR: "+error);
				}
			});
            /* Get data page end */
        });

        <?php if(Core::getUserGroup() < 3){
            echo '/* Get status option start */
            function getStatusOption(statusvalue){
                $(function(){
                    $.ajax({
                        url: Crypto.decode("'.base64_encode(Core::getInstance()->api.'/page/data/status/'.$datalogin['token']).'")+"?_="+randomText(60),
                        dataType: "json",
                        type: "GET",
                        ifModified: true,
                        success: function(data,status) {
                            if (status === "success") {
                                if (data.status == "success"){
                                    $.each(data.results, function(i, item) {
                                        $("#status").append("<option value=\""+data.results[i].StatusID+"\" "+((statusvalue == data.results[i].StatusID) ? "selected" : "")+">"+data.results[i].Status+"</option>");
                                    });
                                }
                            }
                        },
                        error: function(x, e) {}
                    });
                });
            }
            /* Get status option end */
            
            /* Delete data start */
            function deletedata(dataid){
                $(function() {
                    console.log("Process delete data...");
                    var div = document.getElementById("report-updatedata");
                    var btn = "deletebtn";
                    disableClickButton(btn);
                    $.ajax({
                        url: Crypto.decode("'.base64_encode(Core::getInstance()->api.'/page/data/delete').'"),
                        data : {
                            Username: "'.$datalogin['username'].'",
                            Token: "'.$datalogin['token'].'",
                            PageID: dataid
                        },
                        dataType: "json",
                        type: "POST",
                        success: function(data) {
                            div.innerHTML = "";
                            if (data.status == "success"){
                                div.innerHTML = messageHtml("success","'.Core::lang('core_process_delete').' '.Core::lang('page').' '.Core::lang('status_success').'");
                                console.log("'.Core::lang('core_process_delete').' '.Core::lang('page').' '.Core::lang('status_success').'");
                                /* clear from */
                                $("#updatedata")
                                .find("input,textarea,select")
                                .val("")
                                .end()
                                .find("input[type=checkbox]")
                                .prop("checked", "")
                                .end()
                                .find("button[type=submit]")
	    					    .attr("disabled", "disabled")
    			    			.end();
                                $(".summernote").summernote("code", "");
                            } else {
                                div.innerHTML = messageHtml("danger","'.Core::lang('core_process_delete').' '.Core::lang('page').' '.Core::lang('status_failed').'",data.message);
                            }
                        },
                        complete: function(){
                            disableClickButton(btn,false);
                        },
                        error: function(x, e) {}
                    });
                });
            }
            /* Delete data end */';
        }?>

        /* Update data start */
        $("#updatedata").on("submit",sendnewdata);
        function sendnewdata(e){
            console.log("Process update data...");
            e.preventDefault();
            
            /* Validate summernote */
            if ($(".summernote").summernote("isEmpty")) return false;

            var that = $(this);
            that.off("submit"); /* remove handler */
            var div = document.getElementById("report-updatedata");
            var btn = "updatebtn";
            disableClickButton(btn);
                $.ajax({
                    url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/data/update'.((Core::getUserGroup() >2)?'/draft':''))?>"),
                    data : {
                        Username: "<?php echo $datalogin['username']?>",
                        Token: "<?php echo $datalogin['token']?>",
                        Title: $("#title").val(),
                        Image: $("#image").val(),
                        Description: $("#description").val(),
                        Content: $("#content").val(),
                        Tags: $("#tags").val(),
                        <?php echo ((Core::getUserGroup()<3)?'StatusID: $("#status").val(),':'')?>
                        PageID: "<?php echo $_GET['pageid']?>"
                    },
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        div.innerHTML = "";
                        if (data.status == "success"){
                            div.innerHTML = messageHtml("success","<?php echo Core::lang('core_process_update').' '.Core::lang('page').' '.Core::lang('status_success')?>");
                            console.log("<?php echo Core::lang('core_process_update').' '.Core::lang('page').' '.Core::lang('status_success')?>");
                            that.on("submit", sendnewdata); /* add handler back after ajax */
                        } else {
                            div.innerHTML = messageHtml("danger","<?php echo Core::lang('core_process_update').' '.Core::lang('page').' '.Core::lang('status_failed')?>",data.message);
                            that.on("submit", sendnewdata); /* add handler back after ajax */
                        }
                    },
                    complete: function(){
                        disableClickButton(btn,false);
                    },
                    error: function(x, e) {}
                });
        }
        /* Update data end */
    </script>
</body>

</html>
