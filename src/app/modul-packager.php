<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();
if(Core::getUserGroup() != '1') {Core::goToPage('modul-user-profile.php');exit;}?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('packager')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('packager')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('maintenance')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('packager')?></li>
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
                                <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('packager')?></h3><hr>
                                <h6 class="card-subtitle"><?php echo Core::lang('packager_desc')?></h6>
                                <div class="table-responsive m-t-40">
                                    <button type="button" class="btn btn-inverse" data-toggle="modal" data-target=".addnew"><i class="mdi mdi-package-down"></i> <?php echo Core::lang('packager_install')?></button>
                                    <!-- terms modal content -->
                                    <div class="modal fade addnew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-themecolor" id="myLargeModalLabel"><i class="mdi mdi-package-down"></i> <?php echo Core::lang('packager_install')?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form class="form-horizontal form-material" id="addnewdata" action="#">
                                                    <div class="modal-body">
                                                        <div id="report-newdata"></div>
                                                        <div class="form-group">
                                                            <label class="col-md-12"><?php echo Core::lang('namespace')?></label>
                                                             <div class="col-md-12">
                                                                <input id="namespace" type="text" class="form-control form-control-line" required>
                                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('packager_help_1')?></small></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12"><?php echo Core::lang('packager_zip_source')?></label>
                                                             <div class="col-md-12">
                                                                <input id="source" type="text" class="form-control form-control-line" required>
                                                                <span class="help-block text-muted"><small><i class="ti-info-alt"></i> <?php echo Core::lang('packager_help_2')?></small></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal"><?php echo Core::lang('cancel')?></button>
                                                        <button type="button" class="btn btn-success" onclick="installPackage($('#source').val(),$('#namespace').val())"><?php echo Core::lang('packager_install')?></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <table id="datamain" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('name')?></th>
                                                <th><?php echo Core::lang('namespace')?></th>
                                                <th><?php echo Core::lang('package_version')?></th>
                                                <th><?php echo Core::lang('package_size')?></th>
                                                <th><?php echo Core::lang('packager_install_date')?></th>
                                                <th><?php echo Core::lang('status')?></th>
                                                <th class="not-export-col"><?php echo Core::lang('manage')?></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('name')?></th>
                                                <th><?php echo Core::lang('namespace')?></th>
                                                <th><?php echo Core::lang('package_version')?></th>
                                                <th><?php echo Core::lang('package_size')?></th>
                                                <th><?php echo Core::lang('packager_install_date')?></th>
                                                <th><?php echo Core::lang('status')?></th>
                                                <th class="not-export-col"><?php echo Core::lang('manage')?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <b><?php echo Core::lang('packager_dev_1')?></b><br>
                                <?php echo Core::lang('packager_dev_2')?>
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
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script>$(function(){$('head').append('<link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">')});</script>
    <script>
        function installPackage(source,namespace){
            $(function() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo Core::getInstance()->api.'/packager/install/zip/safely/'.$datalogin['username'].'/'.$datalogin['token'].'/?lang='.Core::getInstance()->setlang.'&source='?>"+encodeURIComponent(source)+"&namespace="+encodeURIComponent(namespace),
                    dataType: "json",
                    cache: false,
                    success: function (data, textstatus) {
                        if (data.status == "success"){
                            /* clear form */
                            $("#addnewdata")
                            .find("input,textarea")
                            .val("")
                            .end();
                            writeMessage("#reportmsg","success",data.message);
                            swal("<?php echo Core::lang('packager_install_success')?>", data.message, "success");
                            $('#datamain').DataTable().ajax.reload();
                        } else {
                            writeMessage("#reportmsg","danger",data.message);
                            swal("<?php echo Core::lang('packager_install_failed')?>", data.message, "error");
                        }
                    },
                    error: function (data, textstatus) {
                        writeMessage("#reportmsg","danger",data.message);
                        swal("<?php echo Core::lang('packager_install_failed')?>", data.message, "error");
                    }
                });
            });
        }

        function removePackage(namespace,dataid=''){
            $(function() {
                swal({   
                    title: "<?php echo Core::lang('are_u_sure')?>",   
                    text: "<?php echo Core::lang('packager_uninstall_warning')?>",
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "<?php echo Core::lang('packager_uninstall_ok')?>",
                    cancelButtonText: "<?php echo Core::lang('cancel')?>",
                    closeOnConfirm: false 
                }, function(){
                    $.ajax({
                        type: "GET",
                        url: "<?php echo Core::getInstance()->api.'/packager/uninstall/'.$datalogin['username'].'/'.$datalogin['token'].'/?lang='.Core::getInstance()->setlang.'&namespace='?>"+encodeURIComponent(namespace),
                        dataType: "json",
                        cache: false,
                        success: function (data, textstatus) {
                            if (data.status == "success"){
                                writeMessage("#reportmsg","success",data.message);
                                swal("<?php echo Core::lang('packager_uninstall_success')?>", data.message, "success");
                                $('#datamain').DataTable().ajax.reload();
                                if(dataid != '') $('.'+dataid).modal('hide');
                            } else {
                                writeMessage("#reportmsg","danger",data.message);
                                swal("<?php echo Core::lang('packager_uninstall_failed')?>", data.message, "error");
                            }
                        },
                        error: function (data, textstatus) {
                            writeMessage("#reportmsg","danger",data.message);
                            swal("<?php echo Core::lang('packager_uninstall_failed')?>", data.message, "error");
                        }
                    });
                });
            });
        }

        $(function() {
            var selectCol = [ 0, 1, 2, 3, 4, 5, 6 ];
            var table = $('#datamain').DataTable({
                ajax: {
                    type: "GET",
                    url: "<?php echo Core::getInstance()->api.'/packager/show/all/'.$datalogin['username'].'/'.$datalogin['token'].'?lang='.Core::getInstance()->setlang?>",
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
                    { data: "package.name" },
                    { data: "namespace" },
                    { data: "package.version" },
                    { data: "size" },
                    { data: "date" },
                    { data: "compatible.status"},
                    { "render": function(data,type,row,meta) {
                            var a = '<button type="button" class="btn btn-primary btn-fill btn-wd" data-toggle="modal" data-target=".'+row.namespace.replace('/','_')+'"><i class="mdi mdi-package"></i> <?php echo Core::lang('packager_detail')?></button>';
                            var b = ' <button type="button" class="btn btn-danger btn-fill btn-wd" onclick="removePackage(\''+row.namespace+'\')"><i class="mdi mdi-close"></i> <?php echo Core::lang('packager_uninstall')?></button>';
                            var c = ' <span class="label label-inverse"><?php echo Core::lang('packager_running')?></span>';
                            if (row.namespace != 'modules/packager'){
                                a += b;
                            } else {
                                a += c;
                            }
                            a += '<!-- terms modal content -->\
                                    <div class="modal fade '+row.namespace.replace('/','_')+'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">\
                                        <div class="modal-dialog modal-lg">\
                                            <div class="modal-content">\
                                                <div class="modal-header">\
                                                    <h4 class="modal-title text-themecolor" id="myLargeModalLabel"><i class="mdi mdi-package"></i> <?php echo Core::lang('packager_detail')?> '+row.package.name+'</h4>\
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\
                                                </div>\
                                                <form class="form-horizontal form-material" id="data'+row.namespace.replace('/','_')+'" action="<?php echo $_SERVER['PHP_SELF']?>">\
                                                    <div class="modal-body">\
                                                        <div class="row">\
                                                            <div class="col-md-4">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('packager_install_date')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="created" type="text" class="form-control form-control-line" value="'+row.date+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-4">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('name')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="name" type="text" class="form-control form-control-line" value="'+row.package.name+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-4">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('namespace')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="namespace" type="text" class="form-control form-control-line" value="'+row.namespace+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="row">\
                                                            <div class="col-md-4">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('package_version')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="version" type="text" class="form-control form-control-line" value="'+row.package.version+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-4">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('package_size')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="size" type="text" class="form-control form-control-line" value="'+row.size+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-4">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('status')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="status" type="text" class="form-control form-control-line" value="'+row.compatible.status+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="row">\
                                                            <div class="col-md-12">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('description')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="description" type="text" class="form-control form-control-line" value="'+row.package.description+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-12">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('package_compatible')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="compatible" type="text" class="form-control form-control-line" value="'+row.compatible.message+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-12">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('package_dependency')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="dependency" type="text" class="form-control form-control-line" value="'+row.dependency.message+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-12">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('package_author')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="author" type="text" class="form-control form-control-line" value="'+row.package.author.name+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="col-md-12">\
                                                                <div class="form-group">\
                                                                    <label class="col-md-12"><?php echo Core::lang('package_license')?></label>\
                                                                    <div class="col-md-12">\
                                                                        <input id="license" type="text" class="form-control form-control-line" value="'+row.package.license.url+'" readonly>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                                    <div class="modal-footer">\
                                                        <div class="col-sm-12">\
                                                        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">\
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">';
                                                        if (row.namespace != 'modules/packager'){
                                                            a += '<button type="button" onclick="removePackage(\''+row.namespace+'\',\''+row.namespace.replace('/','_')+'\');return false;" class="btn btn-danger"><?php echo Core::lang('packager_uninstall')?></button>';
                                                        }
                                                        a += '</div>\
                                                            <div class="btn-group mr-2" role="group" aria-label="Second group">\
                                                                <button type="button" class="btn btn-default waves-effect text-left mr-2" onclick="window.open(\''+row.package.url+'\',\'_blank\')"><?php echo Core::lang('package_link_fork')?></button>\
                                                                <button type="button" class="btn btn-success waves-effect text-left mr-2" onclick="window.open(\''+row.readme.url+'\',\'_blank\')"><?php echo Core::lang('package_readme')?></button>\
                                                            </div>\
                                                        </div>\
                                                        </div>\
                                                    </div>\
                                                </form>\
                                            </div>\
                                            <!-- /.modal-content -->\
                                        </div>\
                                        <!-- /.modal-dialog -->\
                                    </div>\
                                    <!-- /.modal -->';
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
