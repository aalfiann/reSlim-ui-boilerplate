<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();
if(Core::getUserGroup() != '1') {Core::goToPage('modul-user-profile.php');exit;}?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('backup_db')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('backup_db')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('maintenance')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('backup_db')?></li>
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
                        <div id="reportmsg"></div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('backup_db')?></h3><hr>
                                <h6 class="card-subtitle"><?php echo Core::lang('backup_info')?></h6>
                                <div class="table-responsive m-t-40">
                                    <button id="submitbtn" type="button" class="btn btn-inverse" onclick="backupNow()"><i class="mdi mdi-backup-restore"></i> <?php echo Core::lang('backup_now')?></button>
                                    <table id="datamain" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('file')?></th>
                                                <th><?php echo Core::lang('tb_file_type')?></th>
                                                <th><?php echo Core::lang('tb_file_size')?></th>
                                                <th><?php echo Core::lang('tb_created_at')?></th>
                                                <th class="not-export-col"><?php echo Core::lang('manage')?></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('file')?></th>
                                                <th><?php echo Core::lang('tb_file_type')?></th>
                                                <th><?php echo Core::lang('tb_file_size')?></th>
                                                <th><?php echo Core::lang('tb_created_at')?></th>
                                                <th class="not-export-col"><?php echo Core::lang('manage')?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="text-center"><button id="deletebtnall" type="button" onclick="backupDeleteAll();" class="btn btn-danger btn-fill btn-wd"><i class="mdi mdi-close"></i> <?php echo Core::lang('delete').' '.Core::lang('all')?></button></div>
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
    <?php include_once 'global-datatables.php';?>
    <!-- Sweet-Alert  -->
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/sweetalert/sweetalert.min.js"></script>
    <script>$(function(){$('head').append('<link href="<?php echo Core::getInstance()->assetspath?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">')});</script>
    <script>
        function backupNow(){
            $(function() {
                var btn = "submitbtn";
                disableClickButton(btn);
                $.ajax({
                    type: "GET",
                    url: "<?php echo Core::getInstance()->api.'/backup/all/'.$datalogin['username'].'/'.$datalogin['token']?>",
                    dataType: "json",
                    cache: false,
                    success: function (data, textstatus) {
                        if (data.status == "success"){
                            writeMessage("#reportmsg","success","<?php echo Core::lang('backup_success')?>",data.message);
                            $('#datamain').DataTable().ajax.reload();
                        } else {
                            writeMessage("#reportmsg","danger","<?php echo Core::lang('backup_failed')?>",data.message);
                        }
                    },
                    complete: function(){
                        disableClickButton(btn,false);
                    },
                    error: function (data, textstatus) {
                        writeMessage("#reportmsg","danger","<?php echo Core::lang('backup_failed')?>",data.message);
                    }
                });
            });
        }

        function backupDelete(filename){
            $(function() {
                var btn = "deletebtn"+filename;
                disableClickButton(btn);
                $.ajax({
                    type: "POST",
                    url: "<?php echo Core::getInstance()->api.'/backup/delete'?>",
                    dataType: "json",
                    data: {
                        Username: "<?php echo $datalogin['username']?>",
                        Token: "<?php echo $datalogin['token']?>",
                        Filename: filename
                    },
                    success: function (data, textstatus) {
                        if (data.status == "success"){
                            writeMessage("#reportmsg","success","<?php echo Core::lang('core_delete_success')?>",data.message);
                            $('#datamain').DataTable().ajax.reload();
                        } else {
                            writeMessage("#reportmsg","danger","<?php echo Core::lang('core_delete_failed')?>",data.message);
                        }
                    },
                    complete: function(){
                        disableClickButton(btn,false);
                    },
                    error: function (data, textstatus) {
                        writeMessage("#reportmsg","danger","<?php echo Core::lang('core_delete_failed')?>",data.message);
                    }
                });
            });
        }

        function backupDeleteAll(filename="*"){
            $(function() {
                swal({   
                    title: "<?php echo Core::lang('are_u_sure')?>",   
                    text: "<?php echo Core::lang('deleted_file_warning')?>",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "<?php echo Core::lang('delete_yes')?>",
                    cancelButtonText: "<?php echo Core::lang('cancel')?>",
                    closeOnConfirm: false 
                }, function(){
                    var btn = "deletebtnall";
                    disableClickButton(btn);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo Core::getInstance()->api.'/backup/delete/all'?>",
                        dataType: "json",
                        data: {
                            Username: "<?php echo $datalogin['username']?>",
                            Token: "<?php echo $datalogin['token']?>",
                            Filename: filename
                        },
                        success: function (data, textstatus) {
                            if (data.status == "success"){
                                swal("<?php echo Core::lang('core_delete_success')?>", data.message, "success");
                                writeMessage("#reportmsg","success","<?php echo Core::lang('core_delete_success')?>",data.message);
                                $('#datamain').DataTable().ajax.reload();
                            } else {
                                swal("<?php echo Core::lang('core_delete_failed')?>", data.message, "error");
                                writeMessage("#reportmsg","danger","<?php echo Core::lang('core_delete_failed')?>",data.message);
                            }
                        },
                        complete: function(){
                            disableClickButton(btn,false);
                        },
                        error: function (data, textstatus) {
                            writeMessage("#reportmsg","danger","<?php echo Core::lang('core_delete_failed')?>",data.message);
                        }
                    });
                });
            });
        }

        $(function() {
            var selectCol = [ 0, 1, 2, 3, 4 ];
            var table = $('#datamain').DataTable({
                ajax: {
                    type: "GET",
                    url: "<?php echo Core::getInstance()->api.'/backup/show/all/'.$datalogin['username'].'/'.$datalogin['token']?>",
                    cache: false,
                    dataSrc: function ( json ) {
                        if (json.status == "success"){
                            return json.files;
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
                    { data: "name" },
                    { data: "type" },
                    { data: "size" },
                    { data: "date" },
                    { "render": function(data,type,row,meta) {
                            var a = '<a class="btn btn-success btn-fill btn-wd" href="'+row.url+'" download><i class="mdi mdi-cloud-download"></i> <?php echo Core::lang('download')?></a> <button id="deletebtn'+row.name+'" type="button" class="btn btn-danger btn-fill btn-wd" onclick="backupDelete(\''+row.name+'\')"><i class="mdi mdi-close"></i> <?php echo Core::lang('delete')?></button>';
                            return a;
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
