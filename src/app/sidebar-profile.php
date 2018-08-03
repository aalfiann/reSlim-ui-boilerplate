<!-- User profile -->
<div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img id="my_image_sidebar" src="<?php echo Core::getInstance()->assetspath?>/images/users/no-pic.jpg" alt="<?php echo $datalogin['username']?> profile pic" /> 
                             <!-- this is blinking heartbit-->
                            <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <h5><?php echo $datalogin['username']?></h5>
                            <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                            <a href="logout.php" class="" data-toggle="tooltip" title="<?php echo Core::lang('logout')?>"><i class="mdi mdi-power"></i></a>

                        <div class="dropdown-menu animated flipInY">
                        <!-- text--> 
                        <a href="modul-user-profile.php" class="dropdown-item"><i class="ti-user"></i> <?php echo Core::lang('my_profile')?></a>
                        <!-- text--> 
                        <div class="dropdown-divider"></div>
                        <!-- text-->  
                        <a href="modul-user-access.php" class="dropdown-item"><i class="ti-settings"></i> <?php echo Core::lang('my_access')?></a>
                        <!-- text--> 
                        <div class="dropdown-divider"></div>
                        <!-- text-->  
                        <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> <?php echo Core::lang('logout')?></a>
                        <!-- text-->  
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->