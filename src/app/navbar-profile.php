<!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="my_image_navbar_small" src="../assets/images/users/no-pic.jpg" alt="<?php echo $datalogin['username']?> profile pic" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img id="my_image_navbar" src="../assets/images/users/no-pic.jpg" alt="<?php echo $datalogin['username']?> profile pic"></div>
                                            <div class="u-text">
                                                <h4><?php echo $datalogin['username']?></h4>
                                                <p id="my_email_navbar" class="text-muted"></p><a href="modul-user-profile.php" class="btn btn-rounded btn-themecolor btn-sm"><?php echo Core::lang('my_profile')?></a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="modul-user-access.php"><i class="ti-settings"></i> <?php echo Core::lang('my_access')?></a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> <?php echo Core::lang('logout')?></a></li>
                                </ul>
                            </div>
                        </li>