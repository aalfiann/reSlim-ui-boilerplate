<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();
if(Core::getUserGroup() > '2') {Core::goToPage('modul-user-profile.php');exit;}?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('data')?> <?php echo Core::lang('user')?> - <?php echo Core::getInstance()->title?></title>
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
                    <h3 class="text-themecolor"><?php echo Core::lang('data')?> <?php echo Core::lang('user')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('user')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('data')?> <?php echo Core::lang('user')?></li>
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
                <!-- Search Box -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 col-12 align-self-center">
                        <div class="input-group">
                            <input id="searchdt" type="text" class="form-control" placeholder="<?php echo Core::lang('input_search')?>">
                            <span class="input-group-btn">
                                <button id="submitsearchdt" onclick="loadData('#datauser','1',selectedOption(),document.getElementById('searchdt').value);" class="btn btn-themecolor" type="button"><?php echo Core::lang('search')?></button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo Core::lang('data').' '.Core::lang('user')?></h3><hr>
                                <div class="table-responsive m-t-40">
                                    <a href="#" data-toggle="modal" data-target=".addnew" class="btn btn-inverse"><i class="mdi mdi-account-plus"></i> <?php echo Core::lang('add').' '.Core::lang('user')?></a>
                                    <!-- terms modal content -->
                                    <div class="modal fade addnew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-themecolor" id="myLargeModalLabel"><i class="mdi mdi-account-plus"></i> <?php echo Core::lang('add').' '.Core::lang('user')?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form class="form-horizontal form-material" id="addnewdata" action="#">
                                                    <div class="modal-body">
                                                        <div id="report-newdata"></div>
                                                        <div class="form-group">
                                                            <label class="col-md-12"><?php echo Core::lang('tb_username')?></label>
                                                             <div class="col-md-12">
                                                                <input id="username" type="text" class="form-control form-control-line" required>
                                                                <div id="usercheck"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12"><?php echo Core::lang('email_address')?></label>
                                                            <div class="col-md-12">
                                                                <input id="email" type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" class="form-control form-control-line" required>
                                                                <div id="emailcheck"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12"><?php echo Core::lang('password')?></label>
                                                            <div class="col-md-12">
                                                                <input id="password1" type="password" class="form-control form-control-line" required>
                                                                <div id="passwordcheck1"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12"><?php echo Core::lang('confirm_password')?></label>
                                                            <div class="col-md-12">
                                                                <input id="password2" type="password" class="form-control form-control-line" required>
                                                                <div id="passwordcheck2"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12"><?php echo Core::lang('tb_role')?></label>
                                                            <div class="col-md-12">
                                                            <select id="role" style="max-height:200px; overflow-y:scroll; overflow-x:hidden;" class="form-control form-control-line" required>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal"><?php echo Core::lang('cancel')?></button>
                                                        <button type="submit" class="btn btn-success"><?php echo Core::lang('submit')?></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                    <table id="datauser" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('tb_username')?></th>
                                                <th><?php echo Core::lang('fullname')?></th>
                                    	        <th><?php echo Core::lang('address')?></th>
                                    	        <th><?php echo Core::lang('phone')?></th>
                                                <th><?php echo Core::lang('email_address')?></th>
                                                <th><?php echo Core::lang('tb_role')?></th>
                                                <th><?php echo Core::lang('status')?></th>
                                                <th><?php echo Core::lang('tb_created_at')?></th>
                                                <th><?php echo Core::lang('tb_updated_at')?></th>
                                                <th><?php echo Core::lang('manage')?></th>
                                                <th><?php echo Core::lang('about_me')?></th>
                                            	<th><?php echo Core::lang('avatar')?></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><?php echo Core::lang('tb_no')?></th>
                                                <th><?php echo Core::lang('tb_username')?></th>
                                                <th><?php echo Core::lang('fullname')?></th>
                                    	        <th><?php echo Core::lang('address')?></th>
                                    	        <th><?php echo Core::lang('phone')?></th>
                                                <th><?php echo Core::lang('email_address')?></th>
                                                <th><?php echo Core::lang('tb_role')?></th>
                                                <th><?php echo Core::lang('status')?></th>
                                                <th><?php echo Core::lang('tb_created_at')?></th>
                                                <th><?php echo Core::lang('tb_updated_at')?></th>
                                                <th><?php echo Core::lang('manage')?></th>
                                                <th><?php echo Core::lang('about_me')?></th>
                                            	<th><?php echo Core::lang('avatar')?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <hr>
                                <div id="pagination"></div>

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
    <!-- This is data table -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
    <script>$(function(){$("head").append('<link href="css/datatables.css" rel="stylesheet" type="text/css" />')});</script>
    <!-- end - This is for export functionality only -->
    <script>
        /** 
         * Create event enter key on search (Pure JS)
         * Usage: button id in search element must be set to submitsearchdt
         */
        document.getElementById("searchdt").addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("submitsearchdt").click();
            }
        });

        /** 
         * Create event select change index on select option (Pure JS)
         * Usage: textbox id in search element must be set to searchdt
         */
        function changeOption(idtable) {
            var selectBox = document.getElementById("selectoptdt");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            loadData(idtable,'1',selectedValue,document.getElementById('searchdt').value);
        }

        /** 
         * Get selected option value for search (Pure JS)
         * Usage: don't do anything, this is depends on paginateDatatables function
         */
        function selectedOption(){
            var selection = document.getElementById("selectoptdt") !== null;
            if (selection){
                var selectBox = document.getElementById("selectoptdt");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                return selectedValue;
            } else {
                return "10";
            }
        }
        
        /** 
         * Custom paginate data from datatables (Pure JS)
         *
         * @param selector is ID element to write html pagination
         * @param idtable is ID element of your datatables
         * @param itemperpage is how many item data will shows per pages
         * @param pagenow is current active page
         * @param pagetotal is how many total page in your records
         *
         * Why use custom paginate datatables:
         * - Mostly company has pagination system on their api json or response data which is they use custom json format
         *
         * Usage:
         * - Because this is called from function loadData(idtable,page="1",itemperpage="10",search=""), so you have to take a look how loadData function works before modifying this
         * - Language inside is using Core::lang PHP class
         */
        function paginateDatatables(selector,idtable,itemperpage,pagenow,pagetotal){
            var div = document.getElementById(selector);
            var data = '<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">\
                    <div class="btn-group mr-2" role="group" aria-label="First group"><p><?php echo Core::lang('dt_shows_page')?> '+pagenow+' <?php echo Core::lang('dt_of')?> '+pagetotal+'</p></div>\
                    <div class="btn-group mr-2" role="group" aria-label="Second group">';
                data += '<select id="selectoptdt" onchange="changeOption(\''+idtable+'\');" class="form-control custom-select mr-3">\
                        <option value="10"'+((itemperpage == '10')?' selected':'')+'>10</option>\
                        <option value="50"'+((itemperpage == '50')?' selected':'')+'>50</option>\
                        <option value="100"'+((itemperpage == '100')?' selected':'')+'>100</option>\
                        <option value="250"'+((itemperpage == '250')?' selected':'')+'>250</option>\
                        <option value="500"'+((itemperpage == '500')?' selected':'')+'>500</option>\
                        <option value="1000"'+((itemperpage == '1000')?' selected':'')+'>1000</option>\
                    </select>';
            if (pagenow <= pagetotal){
                    /* Middle Pagination = If this page + 2 < total page */
                    if ((pagenow + 2) < pagetotal && pagenow >= 3){
                        data += '<button onclick="loadData(\''+idtable+'\',\'1\',\''+itemperpage+'\');" type="button" class="btn btn-secondary hidden-sm-down mr-2"><i class="mdi mdi-skip-backward"></i></button>';
                        data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow-1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-previous"></i></button>';
                        for (p=(pagenow-2);p<=(pagenow+2);p++){
                            data += '<button '+((p == pagenow)?'class="btn btn-themecolor disabled"':'onclick="loadData(\''+idtable+'\',\''+p+'\',\''+itemperpage+'\');" class="btn btn-secondary"')+' type="button">'+p+'</button>';
                        }
                        data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow+1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-next"></i></button>';
                        data += '<button onclick="loadData(\''+idtable+'\',\''+pagetotal+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary ml-2 hidden-sm-down"><i class="mdi mdi-skip-forward"></i></button>';
                    }
                    /* Last Pagination = total page >= 5 and if this page + 2 >= total page */
                    else if ((pagenow + 2) >= pagetotal && pagetotal >= 5){
                        if ((pagenow-1)>0){
                            data += '<button onclick="loadData(\''+idtable+'\',\'1\',\''+itemperpage+'\');" type="button" class="btn btn-secondary mr-2 hidden-sm-down"><i class="mdi mdi-skip-backward"></i></button>';
                            data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow-1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-previous"></i></button>';
                        }
                        for (p=(pagetotal-4);p<=pagetotal;p++)
                        {
                            data += '<button '+((p == pagenow)?'class="btn btn-themecolor disabled"':'onclick="loadData(\''+idtable+'\',\''+p+'\',\''+itemperpage+'\');" class="btn btn-secondary"')+' type="button">'+p+'</button>';
                        }
                        if (pagenow<pagetotal){
                            data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow+1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-next"></i></button>';
                            data += '<button onclick="loadData(\''+idtable+'\',\''+pagetotal+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary ml-2 hidden-sm-down"><i class="mdi mdi-skip-forward"></i></button>';
                        }
                    }
                    /* Last Pagination = total page < 5 and if this page + 2 >= total page */
                    else if ((pagenow + 2) >= pagetotal && pagetotal < 5){
                        if ((pagenow-1)>0){
                            data += '<button onclick="loadData(\''+idtable+'\',\'1\',\''+itemperpage+'\');" type="button" class="btn btn-secondary mr-2 hidden-sm-down"><i class="mdi mdi-skip-backward"></i></button>';
                            data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow-1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-previous"></i></button>';
                        }
                        for (p=(pagetotal-(pagetotal-1));p<=pagetotal;p++)
                        {
                            data += '<button '+((p == pagenow)?'class="btn btn-themecolor disabled"':'onclick="loadData(\''+idtable+'\',\''+p+'\',\''+itemperpage+'\');" class="btn btn-secondary"')+' type="button">'+p+'</button>';
                        }
                        if (pagenow<pagetotal){
                            data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow+1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-next"></i></button>';
                            data += '<button onclick="loadData(\''+idtable+'\',\''+pagetotal+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary ml-2 hidden-sm-down"><i class="mdi mdi-skip-forward"></i></button>';
                        }
                    }
                    /* First pagination and if total page <= 5 */
                    else if (pagetotal <= 5) {
                        if ((pagenow-1)>0){
                            if ((pagenow-1)>1) data += '<button onclick="loadData(\''+idtable+'\',\'1\',\''+itemperpage+'\');" type="button" class="btn btn-secondary mr-2 hidden-sm-down"><i class="mdi mdi-skip-backward"></i></button>';
                            data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow-1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-previous"></i></button>';
                        }
                        for (p=1;p<=pagetotal;p++)
                        {
                            data += '<button '+((p == pagenow)?'class="btn btn-themecolor disabled"':'onclick="loadData(\''+idtable+'\',\''+p+'\',\''+itemperpage+'\');" class="btn btn-secondary"')+' type="button">'+p+'</button>';
                        }
                        data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow+1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-next"></i></button>';
                        data += '<button onclick="loadData(\''+idtable+'\',\''+pagetotal+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary ml-2 hidden-sm-down"><i class="mdi mdi-skip-forward"></i></button>';
                    }
                    /* First pagination and if total page > 5 */
                    else if (pagetotal > 5 && pagenow <=2) {
                        if ((pagenow-1)>0){
                            if ((pagenow-1)>1) data += '<button onclick="loadData(\''+idtable+'\',\'1\',\''+itemperpage+'\');" type="button" class="btn btn-secondary mr-2 hidden-sm-down"><i class="mdi mdi-skip-backward"></i></button>';
                            data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow-1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-previous"></i></button>';
                        }
                        for (p=1;p<=5;p++)
                        {
                            data += '<button '+((p == pagenow)?'class="btn btn-themecolor disabled"':'onclick="loadData(\''+idtable+'\',\''+p+'\',\''+itemperpage+'\');" class="btn btn-secondary"')+' type="button">'+p+'</button>';
                        }
                        data += '<button onclick="loadData(\''+idtable+'\',\''+(pagenow+1)+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary"><i class="mdi mdi-skip-next"></i></button>';
                        data += '<button onclick="loadData(\''+idtable+'\',\''+pagetotal+'\',\''+itemperpage+'\');" type="button" class="btn btn-secondary ml-2 hidden-sm-down"><i class="mdi mdi-skip-forward"></i></button>';
                    }
                }
            data += '</div></div>';
            div.innerHTML = data;
        }
        
        /** 
         * Load data to datatables (jQuery)
         * 
         * @param idtable is ID element of your datatables
         * @param page is the number to be use to call data url api. (only required to handle custom pagination)
         * @param itemperpage is the number to be use to call data url api. (only required to handle custom pagination)
         * @param search is the query to search data to be use to call data url api. (only required to handle custom pagination)
         *
         * Usage: Want to learn, Go to >> https://datatables.net/examples/ 
         */
        function loadData(idtable,page="1",itemperpage="10",search=""){
            $(function() {
                /* Make sure there is no datatables with same id */
                if ($.fn.DataTable.isDataTable(idtable)) {
                    $(idtable).DataTable().destroy();
                }
                /* Choose columns index for printing purpose */
                var selectCol = [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ];
                /* Built table is here */
                var table = $(idtable).DataTable({
                    ajax: {
                        type: "GET",
                        url: "<?php echo Core::getInstance()->api.'/user/data/search/"+page+"/"+itemperpage+"/'.$datalogin['token'].'/?query="+encodeURIComponent(search)+"'?>",
                        cache: false,
                        dataSrc: function (json) {  /* You can handle json response data here */
                            if (json.status == "success"){
                                paginateDatatables("pagination",idtable,json.metadata.items_per_page,json.metadata.page_now,json.metadata.page_total); /* Remove or comment this line if you don't want to use custom pagination */
                                return json.results;
                            } else {
                                document.getElementById("pagination").innerHTML = ""; /* Remove or comment this line if you don't want to use custom pagination */
                                return [];
                            }
                        }
                    },
                    columns: [
                        { "render": function(data,type,row,meta) { /* render event defines the markup of the cell text */
                                var a =  meta.row + meta.settings._iDisplayStart + 1 + ((meta.settings.json.metadata.page_now-1)*meta.settings.json.metadata.items_per_page); /* row object contains the row data */
                                return a;
                            } 
                        },
                        { data: "Username" },
                        { data: "Fullname" },
                        { data: "Address" },
                        { data: "Phone" },
                        { data: "Email" },
                        { data: "Role" },
                        { data: "Status" },
                        { data: "Created_at" },
                        { data: "Updated_at" },
                        { "render": function(data,type,row,meta) { /* render event defines the markup of the cell text */ 
                                var a = '<a href="modul-user-profile-edit.php?username='+row.Username+'"><i class="mdi mdi-pencil-box-outline"></i> <?php echo Core::lang('edit')?></a>'; /* row object contains the row data */
                                return a;
                            } 
                        },
                        { data: "Aboutme" },
                        { data: "Avatar" }
                    ],
                    bFilter: false,
                    paging:   false,
                    info: false,
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
                        search: "<?php echo Core::lang('dt_search')?>"
                    },
                    dom: "Bfrtip",
                    stateSave: true,
                    buttons: [
                        {
                            extend: "copy",
                            text: "<i class=\"mdi mdi-content-copy\"></i> Copy",
                            className: "bg-theme",
                            exportOptions: {
                                columns: selectCol
                            }
                        }, {
                            extend: "csv",
                            text: "<i class=\"mdi mdi-file-document\"></i> CSV",
                            className: "bg-theme",
                            exportOptions: {
                                columns: selectCol
                            }
                        }, {
                            extend: "excel",
                            text: "<i class=\"mdi mdi-file-excel\"></i> Excel",
                            className: "bg-theme",
                            exportOptions: {
                                columns: selectCol
                            }
                        }, {
                            extend: "pdf",
                            text: "<i class=\"mdi mdi-file-pdf\"></i> PDF",
                            className: "bg-theme",
                            exportOptions: {
                                columns: selectCol
                            }
                        }, {
                            extend: "print",
                            text: "<i class=\"mdi mdi-printer\"></i> Print",
                            className: "bg-theme",
                            exportOptions: {
                                columns: selectCol
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
        }
        
        /* Load data from datatables onload */
        loadData('#datauser','1','10');
        loadRoleOption();

        /* Get role option start */
        function loadRoleOption(){
            $(function(){
                $.ajax({
				    url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/role/'.$datalogin['token'])?>")+"?_="+randomText(60),
	    	    	dataType: 'json',
	    	    	type: 'GET',
		    		ifModified: true,
    		        success: function(data,status) {
    			    	if (status === "success") {
					    	if (data.status == "success"){
                                $.each(data.result, function(i, item) {
                                    $("#role").append("<option value=\""+data.result[i].RoleID+"\">"+data.result[i].Role+"</option>");
                                });
    				    	}
    	    			}
	    		    },
                	error: function(x, e) {}
    	    	});
            });
        }
        /* Get role option end */

        /* Add new data start */
        function selectedRole(){
            var selection = document.getElementById("role") !== null;
            if (selection){
                var selectBox = document.getElementById("role");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                return selectedValue;
            } else {
                return "3";
            }
        }

        $("#addnewdata").on("submit",sendnewdata);
        function sendnewdata(e){
            console.log("Process add new data...");
            e.preventDefault();
            var that = $(this);
            that.off("submit"); /* remove handler */
            var div = document.getElementById("report-newdata");
            if ($("#password1").val() === $("#password2").val()){
                if (validationRegex("username","username",true)){
                    $.ajax({
                        url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/register')?>"),
                        data : {
                            Username: $("#username").val(),
                            Email: $("#email").val(),
                            Password: $("#password2").val(),
                            Fullname: $("#username").val(),
                            Address: "",
                            Phone: "",
                            Aboutme: "",
                            Avatar: "",
                            Role: selectedRole()
                        },
                        dataType: "json",
                        type: "POST",
                        success: function(data) {
                            div.innerHTML = "";
                            if (data.status == "success"){
                                div.innerHTML = messageHtml("success","<?php echo Core::lang('core_process_add').' '.Core::lang('user').' '.Core::lang('status_success')?>");
                                /* clear from */
                                $("#addnewdata")
                                .find("input,textarea")
                                .val("")
                                .end()
                                .find("input[type=checkbox]")
                                .prop("checked", "")
                                .end();
                                console.log("<?php echo Core::lang('core_process_add').' '.Core::lang('user').' '.Core::lang('status_success')?>");
                                $('#datauser').DataTable().ajax.reload(); /* reload data table */
                                that.on("submit", sendnewdata); /* add handler back after ajax */
                            } else {
                                div.innerHTML = messageHtml("danger","<?php echo Core::lang('core_process_add').' '.Core::lang('user').' '.Core::lang('status_failed')?>",data.message);
                                that.on("submit", sendnewdata); /* add handler back after ajax */
                            }
                        },
                        error: function(x, e) {}
                    }); 
                } else {
                    div.innerHTML = messageHtml("danger","<?php echo Core::lang('core_register_failed')?>","<?php echo Core::lang('username_check_format')?>");
                    that.on("submit", sendnewdata); /* add handler back after ajax */
                }
                  
            } else {
                div.innerHTML = messageHtml("danger","<?php echo Core::lang('not_match_password')?>");
                that.on("submit", sendnewdata); /* add handler back after ajax */
            }
        }
        /* Add new data end */

        $(function() {
            var timer;
            var x;
            /* Check user registered start */
            $('#username').on('keyup', function() {
                if (!$.trim($('#username').val()).length){
                    $("#usercheck").html('<span class="help-block text-danger"><i class="mdi mdi-close"></i> <?php echo Core::lang('input_required')?></span>');
                } else {
                    if (validationRegex("username","username",true)){
                        $("#usercheck").html('');
                        if (x) { x.abort() } // If there is an existing XHR, abort it.
                        clearTimeout(timer); // Clear the timer so we don't end up with dupes.
                        timer = setTimeout(function() { // assign timer a new timeout 
                            x = $.ajax({
                                url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/verify/register/')?>")+encodeURIComponent($('#username').val())+"?_="+randomText(1),
                                dataType: "json",
                                type: "GET",
                                success: function(data) {
                                    if (data.status == "success"){
                                        $("#usercheck").html('<span class="help-block text-danger name"><i class="mdi mdi-close"></i> <?php echo Core::lang('username_check_not_found')?></span>');
                                    } else {
                                        $("#usercheck").html('<span class="help-block text-success name"><i class="mdi mdi-check"></i> <?php echo Core::lang('username_check_ok')?></span>');
                                    }
                                },
                                error: function(x, e) {
                                    $("#usercheck").html('');
                                }
                            }); // run ajax request and store in x variable (so we can cancel)
                        }, 3000); // 3000ms delay, tweak for faster/slower
                    } else {
                        if (x) { x.abort() } // If there is an existing XHR, abort it.
                        clearTimeout(timer); // Clear the timer so we don't end up with dupes.
                        $("#usercheck").html('<span class="help-block text-danger"><i class="mdi mdi-close"></i> <?php echo Core::lang('username_check_format')?></span>');
                    }
                }
            });
            /* Check user registered end */

            /* Check user email start */
            $('#email').on('keyup', function() {
                if (!$.trim($('#email').val()).length){
                    $("#emailcheck").html('<span class="help-block text-danger"><i class="mdi mdi-close"></i> <?php echo Core::lang('input_required')?></span>');
                } else {
                    if (validationRegex("email","email",true)){
                        if (x) { x.abort() } // If there is an existing XHR, abort it.
                        clearTimeout(timer); // Clear the timer so we don't end up with dupes.
                        timer = setTimeout(function() { // assign timer a new timeout 
                            x = $.ajax({
                                url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/verify/email/')?>")+encodeURIComponent($('#email').val())+"?_="+randomText(1),
                                dataType: "json",
                                type: "GET",
                                success: function(data) {
                                    if (data.status == "success"){
                                        $("#emailcheck").html('<span class="help-block text-danger name"><i class="mdi mdi-close"></i> <?php echo Core::lang('email_check_no')?></span>');
                                    } else {
                                        $("#emailcheck").html('<span class="help-block text-success name"><i class="mdi mdi-check"></i> <?php echo Core::lang('email_check_ok')?></span>');
                                    }
                                },
                                error: function(x, e) {
                                    $("#emailcheck").html('');
                                }
                            });
                        }, 3000); // 3000ms delay, tweak for faster/slower
                    } else {
                        if (x) { x.abort() } // If there is an existing XHR, abort it.
                        clearTimeout(timer); // Clear the timer so we don't end up with dupes.
                        $("#emailcheck").html('<span class="help-block text-danger name"><i class="mdi mdi-close"></i> <?php echo Core::lang('email_check_invalid')?></span>');
                    }
                }
            });
            /* Check user email end */

            /* Check password start */
            $('#password1').on('keyup', function() {
			    var a = $('#password1').val();
    			var b = $('#password2').val();
                if (!$.trim($('#password1').val()).length){
                    $("#passwordcheck1").html('<span class="help-block text-danger"><i class="mdi mdi-close"></i> <?php echo Core::lang('input_required')?></span>');
                } else {
                    if (a != b) {
                        $("#passwordcheck1").html('<span class="help-block text-success"><i class="mdi mdi-check"></i> <?php echo Core::lang('pass_check_ok')?></span>');
                        $("#passwordcheck2").html('<span class="help-block text-danger"><i class="mdi mdi-close"></i> <?php echo Core::lang('pass_check_no')?></span>');
        			} else {
                        $("#passwordcheck1").html('<span class="help-block text-success"><i class="mdi mdi-check"></i> <?php echo Core::lang('pass_check_ok')?></span>');
                        $("#passwordcheck2").html('<span class="help-block text-success"><i class="mdi mdi-check"></i> <?php echo Core::lang('pass_check_match')?></span>');
		    	    }
                }
    		});
	    	$('#password2').on('keyup', function() {
		    	var a = $('#password1').val();
			    var b = $('#password2').val();
    			if (!$.trim($('#password2').val()).length){
	    			$("#passwordcheck2").html('<span class="help-block text-danger"><i class="mdi mdi-close"></i> <?php echo Core::lang('input_required')?></span>');
		    	} else {
                    if (a != b) {
                        $("#passwordcheck2").html('<span class="help-block text-danger"><i class="mdi mdi-close"></i> <?php echo Core::lang('pass_check_no')?></span>');
				    } else {
                        $("#passwordcheck1").html('<span class="help-block text-success"><i class="mdi mdi-check"></i> <?php echo Core::lang('pass_check_ok')?></span>');
                        $("#passwordcheck2").html('<span class="help-block text-success"><i class="mdi mdi-check"></i> <?php echo Core::lang('pass_check_match')?></span>');
	    			}
    			}
	    	});
            /* Check password end */
        });
    </script>
</body>

</html>
