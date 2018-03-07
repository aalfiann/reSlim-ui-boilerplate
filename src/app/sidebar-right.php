<!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> <?php echo Core::lang('theme_panel')?> <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b><?php echo Core::lang('theme_light')?></b></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('default');" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('green');" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('red');" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('blue');" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('purple');" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('megna');" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b><?php echo Core::lang('theme_dark')?></b></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('default-dark');" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('green-dark');" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('red-dark');" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('blue-dark');" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('purple-dark');" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" onclick="setTheme('megna-dark');" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <hr>
                            <ul class="m-t-20 chatonline">
                                <li>
                                    <b>App Version:</b> <?php echo Core::getInstance()->version?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->