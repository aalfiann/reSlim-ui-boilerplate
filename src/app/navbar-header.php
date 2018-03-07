<!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <?php include 'navbar-logo.php';?>
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- navbar left -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(toggleFullScreen())" data-toggle="tooltip" title="<?php echo Core::lang('fullscreen')?>"><i class="ti-fullscreen"></i></a> </li>
                        <?php //include_once 'navbar-notifications.php';?>
                        <?php //include_once 'navbar-emails.php';?>
                        <?php //include_once 'navbar-info.php';?>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- navbar right -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <?php include_once 'navbar-search.php';?>
                        <?php //include_once 'navbar-language.php';?>
                        <?php if(!empty($datalogin)) include_once 'navbar-profile.php';?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->