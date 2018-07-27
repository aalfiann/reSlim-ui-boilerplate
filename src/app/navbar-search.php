<?php 
    if (empty($datalogin)){
        echo '<!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
            <div class="app-search">
                <input id="globalsearch" type="text" class="form-control" placeholder="'.Core::lang('placeholder_global_search').'"> <a class="srh-btn"><i class="ti-close"></i></a>
            </div>
        </li>';
    }
?>