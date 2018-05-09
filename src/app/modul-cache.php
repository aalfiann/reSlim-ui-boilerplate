<?php 
spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();
if(Core::getUserGroup() > '2') {Core::goToPage('modul-user-profile.php');exit;}?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>
    <title><?php echo Core::lang('cache')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('cache')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('maintenance')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('cache')?></li>
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
                <div class="row page-titles">
                    <div class="col-md-12 col-12 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('cache_title')?></h3>
                        <p class="text-muted"><?php echo Core::lang('cache_description')?></p>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center flex-row">
                                <div class="p-2 display-5 text-themecolor"><i class="mdi mdi-database"></i> <span id="hddusepercent">0%</span></div>
                                <div class="p-2">
                                    <h3 class="m-b-0"><?php echo Core::lang('hdd_use_status')?></h3></div>
                                </div>
                                <hr>
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td><?php echo Core::lang('hdd_total_size')?></td>
                                        <td class="font-medium"><span id="hddtotalsize">0</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo Core::lang('hdd_used_size')?></td>
                                        <td class="font-medium"><span id="hddusesize">0</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo Core::lang('hdd_free_size')?></td>
                                        <td class="font-medium"><span id="hddfreesize">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
                                                <h1 id="cachedatasize" class="font-light text-info">0</h1>
                                                <h6 class="text-muted"><i class="mdi mdi-folder-multiple-outline"></i> <?php echo Core::lang('folder')?> <span id="folderdata"></span></h6>
                                                <h6 class="text-muted"><?php echo Core::lang('total').' '.Core::lang('data')?>: <span id="cachedatatotal">0</span></h6>
                                            </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <h6 id="cachedatapercent" class="font-light">0%</h6>
                                                <div class="progress">
                                                    <div id="dataprogress" class="progress-bar bg-info" role="progressbar" style="width: 0%; height: 6px;"></div>
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-secondary" onclick="clearCacheData()"><?php echo Core::lang('cache_clear')?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
                                                <h1 id="cachekeysize" class="font-light text-success">0</h1>
                                                <h6 class="text-muted"><i class="mdi mdi-folder-multiple-outline"></i> <?php echo Core::lang('folder')?> <span id="folderkey"></span></h6>
                                                <h6 class="text-muted"><?php echo Core::lang('total').' '.Core::lang('data')?>: <span id="cachekeytotal">0</span></h6>
                                            </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <h6 id="cachekeypercent" class="font-light">0%</h6>
                                                <div class="progress">
                                                    <div id="keyprogress" class="progress-bar bg-success" role="progressbar" style="width: 0%; height: 6px;"></div>
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-secondary" onclick="clearCacheKey()"><?php echo Core::lang('cache_clear')?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column Info -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <b><?php echo Core::lang('cache_status')?> <span id="cachestatus" class="pull-right badge badge-success"></span></b>
                                    </div>
                                    <div class="card-body">
                                        <p id="cachedescription"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Column Info -->
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div id="message"></div>
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
        function clearValueData(){
            document.getElementById("hddusepercent").innerHTML="0%";
            document.getElementById("hddtotalsize").innerHTML="0";
            document.getElementById("hddusesize").innerHTML="0";
            document.getElementById("hddfreesize").innerHTML="0";

            document.getElementById("cachedatasize").innerHTML="0";
            document.getElementById("folderdata").innerHTML="";
            document.getElementById("cachedatatotal").innerHTML="0";
            document.getElementById("cachedatapercent").innerHTML="0%";
        }

        function clearValueKey(){
            document.getElementById("cachekeysize").innerHTML="0";
            document.getElementById("folderkey").innerHTML="";
            document.getElementById("cachekeytotal").innerHTML="0";
            document.getElementById("cachekeypercent").innerHTML="0%";
        }

        function getCacheInfo(){
            $(function(){
                $.when(
        			$.ajax({ /* Get user statistic start */
		        	    type: "GET",
        				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/maintenance/cache/data/info')?>"),
		        		dataType: "json",
                        cache: false,
        				success: function( data ) {
		        		    clearValueData();
        					if(data.status=="success"){
		        			    document.getElementById("hddusepercent").innerHTML=data.percent.hdd.use;
                                document.getElementById("hddtotalsize").innerHTML=data.size.hdd.total;
                                document.getElementById("hddusesize").innerHTML=data.size.hdd.use;
                                document.getElementById("hddfreesize").innerHTML=data.size.hdd.free;
                        
                                document.getElementById("cachedatasize").innerHTML=data.size.cache.use;
                                document.getElementById("cachestatus").innerHTML=ucwords(data.info.status);
                                document.getElementById("cachedescription").innerHTML=data.info.description;
                                document.getElementById("folderdata").innerHTML=data.info.folder;
                                document.getElementById("cachedatatotal").innerHTML=data.info.files;
                                document.getElementById("cachedatapercent").innerHTML=data.percent.cache.use;
                                $('#dataprogress').css('width', data.percent.cache.use);
		        			} else {
				        	    clearValueData();
        					}
		        		},
        				error: function( xhr, textStatus, error ) {
		        		    console.log("XHR: " + xhr.statusText);
				        	console.log("STATUS: "+textStatus);
        					console.log("ERROR: "+error);
		        			console.log("TRACE: "+xhr.responseText);
        				}
		        	}),
                    $.ajax({ /* Get user statistic start */
		        	    type: "GET",
        				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/maintenance/cache/apikey/info')?>"),
		        		dataType: "json",
                        cache: false,
				        success: function( data ) {
        				    clearValueKey();
		        			if(data.status=="success"){
				        	    document.getElementById("cachekeysize").innerHTML=data.size.cache.use;
                                document.getElementById("folderkey").innerHTML=data.info.folder;
                                document.getElementById("cachekeytotal").innerHTML=data.info.files;
                                document.getElementById("cachekeypercent").innerHTML=data.percent.cache.use;
                                $('#keyprogress').css('width', data.percent.cache.use);
        					} else {
		        			    clearValueKey();
				        	}
        				},
		        		error: function( xhr, textStatus, error ) {
				            console.log("XHR: " + xhr.statusText);
        					console.log("STATUS: "+textStatus);
		        			console.log("ERROR: "+error);
				        	console.log("TRACE: "+xhr.responseText);
        				}
		        	})
        		).then(function( data,api ) {});
            })
        }

        function clearCacheData(){
            $(function(){
                $.ajax({ /* Get user statistic start */
		        	    type: "GET",
        				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/maintenance/cache/data/delete/'.$datalogin['username'].'/'.$datalogin['token'])?>"),
		        		dataType: "json",
                        cache: false,
				        success: function( data ) {
        				    document.getElementById("message").innerHTML='';
		        			if(data.status=="success"){
				        	    document.getElementById("message").innerHTML=messageHtml(
                                    'success',
                                    '<?php echo Core::lang('cache_status_delete_success')?>',
                                    '<br><br><?php echo Core::lang('folder')?>: <b>'+document.getElementById("folderdata").innerHTML+'</b><br>\
                                    <?php echo Core::lang('total').' '.Core::lang('data')?>: <b>'+data.total_files+'</b><br>\
                                    <?php echo Core::lang('cache_status_delete_total')?>: <b>'+data.total_deleted+'</b><br><br>\
                                    <?php echo Core::lang('cache_status_delete_msg_1')?> '+data.age+' <?php echo Core::lang('cache_status_delete_msg_2')?><br>\
                                    <?php echo Core::lang('cache_status_delete_process')?>: <b>'+data.execution_time+' (microseconds)</b>'
                                );
                                getCacheInfo();
        					} else {
		        			    document.getElementById("message").innerHTML=messageHtml(
                                    'danger',
                                    '<?php echo Core::lang('cache_status_delete_failed')?>',
                                    data.message
                                );
				        	}
        				},
		        		error: function( xhr, textStatus, error ) {
				            console.log("XHR: " + xhr.statusText);
        					console.log("STATUS: "+textStatus);
		        			console.log("ERROR: "+error);
				        	console.log("TRACE: "+xhr.responseText);
        				}
		        	});
            });
        }

        function clearCacheKey(){
            $(function(){
                $.ajax({ /* Get user statistic start */
		        	    type: "GET",
        				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/maintenance/cache/apikey/delete/'.$datalogin['username'].'/'.$datalogin['token'])?>"),
		        		dataType: "json",
                        cache: false,
				        success: function( data ) {
        				    document.getElementById("message").innerHTML='';
		        			if(data.status=="success"){
				        	    document.getElementById("message").innerHTML=messageHtml(
                                    'success',
                                    '<?php echo Core::lang('cache_status_delete_success')?>',
                                    '<br><br><?php echo Core::lang('folder')?>: <b>'+document.getElementById("folderkey").innerHTML+'</b><br>\
                                    <?php echo Core::lang('total').' '.Core::lang('data')?>: <b>'+data.total_files+'</b><br>\
                                    <?php echo Core::lang('cache_status_delete_total')?>: <b>'+data.total_deleted+'</b><br><br>\
                                    <?php echo Core::lang('cache_status_delete_msg_1')?> '+data.age+' <?php echo Core::lang('cache_status_delete_msg_2')?><br>\
                                    <?php echo Core::lang('cache_status_delete_process')?>: <b>'+data.execution_time+' (microseconds)</b>'
                                );
                                getCacheInfo();
        					} else {
		        			    document.getElementById("message").innerHTML=messageHtml(
                                    'danger',
                                    '<?php echo Core::lang('cache_status_delete_failed')?>',
                                    data.message
                                );
				        	}
        				},
		        		error: function( xhr, textStatus, error ) {
				            console.log("XHR: " + xhr.statusText);
        					console.log("STATUS: "+textStatus);
		        			console.log("ERROR: "+error);
				        	console.log("TRACE: "+xhr.responseText);
        				}
		        	});
            });
        }

        getCacheInfo();
    </script>
</body>

</html>
