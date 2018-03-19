<?php 
spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();
if(Core::getUserGroup() > '3') {Core::goToPage('modul-user-profile.php');exit;}?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <title><?php echo Core::lang('dashboard')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('system')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('dashboard')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('system')?></li>
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
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 id="totalfile" class="font-light text-success">0</h1>
                                        <h6 class="text-muted"><i class="mdi mdi-weather-cloudy"></i> <?php echo Core::lang('total').' '.Core::lang('file')?></h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <h6 id="totalfilepercent" class="font-light">0%</h6>
                                        <div class="progress">
                                            <div id="percentfile" class="progress-bar bg-success" role="progressbar" style="width: 0%; height: 6px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 id="totalapi" class="font-light text-danger">0</h1>
                                        <h6 class="text-muted"><i class="mdi mdi-bullseye"></i> <?php echo Core::lang('total').' '.Core::lang('api_key')?></h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <h6 id="totalapipercent" class="font-light">0%</h6>
                                        <div class="progress">
                                            <div id="percentapi" class="progress-bar bg-danger" role="progressbar" style="width:0%; height: 6px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 id="totalpage" class="font-light text-warning">0</h1>
                                        <h6 class="text-muted"><i class="mdi mdi-file"></i> <?php echo Core::lang('total').' '.Core::lang('page')?></h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <h6 id="totalpagepercent" class="font-light">0%</h6>
                                        <div class="progress">
                                            <div id="percentpage" class="progress-bar bg-warning" role="progressbar" style="width: 0%; height: 6px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo Core::lang('chart').' '.Core::lang('data').' '.Core::lang('file').' &amp; '.Core::lang('data').' '.Core::lang('page')?> - <?php echo date('Y')?></h3>
                                <hr>
                                <div id="firstchart" class="ct-sm-line-chart" style="height: 400px;"></div>
                                <hr>
                                <p><i class="fa fa-circle text-info"></i> <?php echo Core::lang('data').' '.Core::lang('file')?> <i class="fa fa-circle text-danger"></i> <?php echo Core::lang('data').' '.Core::lang('page')?></p>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo Core::lang('chart').' '.Core::lang('data').' '.Core::lang('api_keys')?> - <?php echo date('Y')?></h3>
                                <hr>
                                <div id="secondchart" class="ct-sm-line-chart" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-12"><?php echo Core::getMessage('success',Core::lang('notice_cache_onehour'),Core::lang('notice_cache_clear'))?></div>
                </div>
                <!-- Row -->
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
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script>
        $.when(
            $.ajax({ /* Get file statistic start */
				type: "GET",
				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/stats/upload/summary/'.$datalogin['username'].'/'.$datalogin['token'])?>")+"?_="+randomText(60),
				dataType: "json",
				success: function( data ) {
				    document.getElementById("totalfile").innerHTML="0";
                    document.getElementById("totalfilepercent").innerHTML="0%";
					if(data.status=="success"){
					    document.getElementById("totalfile").innerHTML=addCommas(data.result[0].Total);
                        document.getElementById("totalfilepercent").innerHTML=data.result[0].Percent_Up+"%";
                        $('#percentfile').css('width', data.result[0].Percent_Up+'%');
					} else {
					    document.getElementById("totalfile").innerHTML="0";
                        document.getElementById("totalfilepercent").innerHTML="0%";
					}
				},
				error: function( xhr, textStatus, error ) {
				    console.log("XHR: " + xhr.statusText);
					console.log("STATUS: "+textStatus);
					console.log("ERROR: "+error);
				    console.log("TRACE: "+xhr.responseText);
				}
			}),
            $.ajax({ /* Get api statistic start */
				type: "GET",
				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/stats/api/summary/'.$datalogin['username'].'/'.$datalogin['token'])?>")+"?_="+randomText(60),
				dataType: "json",
				success: function( data ) {
				    document.getElementById("totalapi").innerHTML="0";
                    document.getElementById("totalapipercent").innerHTML="0%";
					if(data.status=="success"){
					    document.getElementById("totalapi").innerHTML=addCommas(data.result[0].Total);
                        document.getElementById("totalapipercent").innerHTML=data.result[0].Percent_Up+"%";
                        $('#percentapi').css('width', data.result[0].Percent_Up+'%');
					} else {
					    document.getElementById("totalapi").innerHTML="0";
                        document.getElementById("totalapipercent").innerHTML="0%";
					}
				},
				error: function( xhr, textStatus, error ) {
				    console.log("XHR: " + xhr.statusText);
					console.log("STATUS: "+textStatus);
					console.log("ERROR: "+error);
				    console.log("TRACE: "+xhr.responseText);
				}
			}),
            $.ajax({ /* Get page statistic start */
				type: "GET",
				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/stats/data/summary/'.$datalogin['username'].'/'.$datalogin['token'])?>")+"?_="+randomText(60),
				dataType: "json",
				success: function( data ) {
				    document.getElementById("totalpage").innerHTML="0";
                    document.getElementById("totalpagepercent").innerHTML="0%";
					if(data.status=="success"){
					    document.getElementById("totalpage").innerHTML=addCommas(data.result[0].Total);
                        document.getElementById("totalpagepercent").innerHTML=data.result[0].Percent_Up+"%";
                        $('#percentpage').css('width', data.result[0].Percent_Up+'%');
					} else {
					    document.getElementById("totalpage").innerHTML="0";
                        document.getElementById("totalpagepercent").innerHTML="0%";
					}
				},
				error: function( xhr, textStatus, error ) {
				    console.log("XHR: " + xhr.statusText);
					console.log("STATUS: "+textStatus);
					console.log("ERROR: "+error);
				    console.log("TRACE: "+xhr.responseText);
				}
			})
		).then(function( file,api,page ) {});

        //Simple line chart 
        $.when(
            $.ajax({ /* Get file chart start */
				type: "GET",
				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/stats/upload/chart/'.date('Y').'/'.$datalogin['username'].'/'.$datalogin['token'])?>")+"?_="+randomText(60),
                dataType: "json"
			}),
            $.ajax({ /* Get api statistic start */
				type: "GET",
				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/stats/api/chart/'.date('Y').'/'.$datalogin['username'].'/'.$datalogin['token'])?>")+"?_="+randomText(60),
                dataType: "json"
			}),
            $.ajax({ /* Get api statistic start */
				type: "GET",
				url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/stats/data/chart/'.date('Y').'/'.$datalogin['username'].'/'.$datalogin['token'])?>")+"?_="+randomText(60),
                dataType: "json"
			})
        ).then(function( filec,apic,pagec ) {
            var datalabels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
            var uploadseries = [null,null,null,null,null,null,null,null,null,null,null,null];
            var apiseries = [null,null,null,null,null,null,null,null,null,null,null,null];
            var pageseries = [null,null,null,null,null,null,null,null,null,null,null,null];

            if(filec[0].status=="success"){
                uploadseries = filec[0].results.series[0];
			}

            if(apic[0].status=="success"){
                apiseries = apic[0].results.series[0];
			}
            
            if(pagec[0].status=="success"){
                pageseries = pagec[0].results.series[0];
			}

            new Chartist.Line('#firstchart', {
                labels: datalabels,
                series: [
                    uploadseries,
                    pageseries
                ]
            },
            {
                fullWidth: true,
                plugins: [
                    Chartist.plugins.tooltip()
                ],
                showArea: true,
                chartPadding: {
                    right: 40
                }
            });

            new Chartist.Line('#secondchart', {
                labels: datalabels,
                series: [
                    apiseries
                ]
            },
            {
                fullWidth: true,
                plugins: [
                    Chartist.plugins.tooltip()
                ],
                showArea: true,
                chartPadding: {
                    right: 40
                }
            });
            
        });
        

// line chart with area
    </script>
</body>

</html>
