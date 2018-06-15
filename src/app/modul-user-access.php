<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('user_access')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('user_access')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('user')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('user_access')?></li>
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
                        <div id="reportrevoke"></div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('title_access')?></h3><hr>
                                <h6 class="card-subtitle"><?php echo Core::lang('info_access')?></h6>
                                <h6 class="card-subtitle"><?php echo Core::lang('notice_access')?></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="datatoken" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('tb_username')?></th>
                                                <th><?php echo Core::lang('token')?></th>
                                                <th><?php echo Core::lang('date_login')?></th>
                                                <th><?php echo Core::lang('expired')?></th>
                                                <th class="not-export-col"><?php echo Core::lang('manage')?></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('tb_username')?></th>
                                                <th><?php echo Core::lang('token')?></th>
                                                <th><?php echo Core::lang('date_login')?></th>
                                                <th><?php echo Core::lang('expired')?></th>
                                                <th class="not-export-col"><?php echo Core::lang('manage')?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="text-center"><button onclick="revokeAllCall();" class="btn btn-danger btn-fill btn-wd"><i class="mdi mdi-key-remove"></i> <?php echo Core::lang('revoke_access_all')?></button></div>
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
    <?php include_once 'global-datatables.php';?>
    <script>
        function revokeCall(token){
            $(function() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo Core::getInstance()->api.'/user/token/delete'?>",
                    data : {
                        Username: "<?php echo $datalogin['username']?>",
                        Token: "<?php echo $datalogin['token']?>",
                        TokenToDelete: token
                    },
                    dataType: "json",
                    success: function (datarevoked, textstatus) {
                        if (datarevoked.status == "success"){
                            writeMessage("#reportrevoke","success","<?php echo Core::lang('core_delete_success')?>",datarevoked.message);
                            $('#datatoken').DataTable().ajax.reload();
                        } else {
                            writeMessage("#reportrevoke","danger","<?php echo Core::lang('core_delete_failed')?>",datarevoked.message);
                        }
                    },
                    error: function (datarevoked, textstatus) {
                        writeMessage("#reportrevoke","danger","<?php echo Core::lang('core_delete_failed')?>",datarevoked.message);
                    }
                });
            });
        }

        function revokeAllCall(){
            $(function() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo Core::getInstance()->api.'/user/token/delete/all'?>",
                    data : {
                        Username: "<?php echo $datalogin['username']?>",
                        Token: "<?php echo $datalogin['token']?>"
                    },
                    dataType: "json",
                    success: function (datarevoked, textstatus) {
                        if (datarevoked.status == "success"){
                            writeMessage("#reportrevoke","success","<?php echo Core::lang('core_delete_success')?>",datarevoked.message);
                            $('#datatoken').DataTable().ajax.reload();
                        } else {
                            writeMessage("#reportrevoke","danger","<?php echo Core::lang('core_delete_failed')?>",datarevoked.message);
                        }
                    },
                    error: function (datarevoked, textstatus) {
                        writeMessage("#reportrevoke","danger","<?php echo Core::lang('core_delete_failed')?>",datarevoked.message);
                    }
                });
            });
        }

        $(function() {
            var selectCol = [ 0, 1, 2, 3, 4 ];
            var table = $('#datatoken').DataTable({
                ajax: {
                    type: "GET",
                    url: "<?php echo Core::getInstance()->api.'/user/token/data/'.$datalogin['username'].'/'.$datalogin['token']?>",
                    cache: false,
                    dataSrc: function ( json ) {
                        if (json.status == "success"){
                            return json.results;
                        } else {
                            return [];
                        }
                    }
                },
                columns: [
                    { "render": function(data,type,row,meta) { 
                            var a = meta.row + meta.settings._iDisplayStart + 1;
                            return a;
                        } 
                    },
                    { data: "Username" },
                    { data: "RS_Token" },
                    { data: "Created" },
                    { data: "Expired" },
                    { "render": function(data,type,row,meta) {
                            var a = '<button onclick="revokeCall(\''+row.RS_Token+'\');" class="btn btn-danger btn-fill btn-wd"><?php echo Core::lang('revoke_access')?></button>';
                            if (row.RS_Token == "<?php echo $datalogin['token']?>"){
                                return '<b class="text-success"><?php echo Core::lang('active_access')?></b>';
                            } else {
                                return a;
                            }
                        } 
                    }
                ],
                bFilter: true,
                paging:   true,
                info: true,
                processing: true,
                language: {
                    lengthMenu: "<?php echo Core::lang('dt_display')?>",
                    zeroRecords: "<?php echo Core::lang('dt_not_found')?>",
                    info: "<?php echo Core::lang('dt_info')?>",
                    infoEmpty: "<?php echo Core::lang('dt_info_empty')?>",
                    infoFiltered: "<?php echo Core::lang('dt_filtered')?>",
                    decimal: "",
                    emptyTable: "<?php echo Core::lang('dt_table_empty')?>",
                    infoPostFix: "",
                    thousands: "<?php echo Core::lang('dt_thousands')?>",
                    loadingRecords: "<?php echo Core::lang('dt_loading')?>",
                    processing: "<?php echo Core::lang('dt_process')?>",
                    search: "<?php echo Core::lang('dt_search')?>",
                    paginate: {
                        first:      '<?php echo Core::lang('dt_first')?>',
                        last:       '<?php echo Core::lang('dt_last')?>',
                        next:       '<?php echo Core::lang('dt_next')?>',
                        previous:   '<?php echo Core::lang('dt_prev')?>'
                    }
                },
                dom: "Bfrtip",
                stateSave: true,
                buttons: [
                    {
                        extend: "copy",
                        text: "<i class=\"mdi mdi-content-copy\"></i> Copy",
                        className: "bg-theme",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    }, {
                        extend: "csv",
                        text: "<i class=\"mdi mdi-file-document\"></i> CSV",
                        className: "bg-theme",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    }, {
                        extend: "excel",
                        text: "<i class=\"mdi mdi-file-excel\"></i> Excel",
                        className: "bg-theme",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    }, {
                        extend: "pdf",
                        text: "<i class=\"mdi mdi-file-pdf\"></i> PDF",
                        className: "bg-theme",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    }, {
                        extend: "print",
                        text: "<i class=\"mdi mdi-printer\"></i> Print",
                        className: "bg-theme",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    }, {
                        extend: 'colvis',
                        text: "Hide/Show Collumn <i class=\"mdi mdi-chevron-down\"></i>",
                        className: "bg-secondary",
                        columns: selectCol
                    }
                ]
            });
        });
    </script>
</body>

</html>
