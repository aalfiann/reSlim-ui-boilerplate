<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
//Random Key
$aaa=rand(0,5);$bbb=rand(3,9);?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">

<head>
    <?php include_once 'global-meta.php';?>
    <title><?php echo Core::lang('register')?> - <?php echo Core::getInstance()->title?></title>
</head>

<body>
    <?php include_once 'global-preloader.php';?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card" id="register">
                <div id="report-register"></div>
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" id="sendregister" action="#">
                        <h3 class="box-title m-b-20"><i class="mdi mdi-account-plus"></i> <?php echo Core::lang('register')?></h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="username" class="form-control" type="text" required="" placeholder="<?php echo Core::lang('username')?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" class="form-control" type="text" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required="" placeholder="<?php echo Core::lang('email_address')?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="password1" class="form-control" type="password" required="" placeholder="<?php echo Core::lang('password')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password2" class="form-control" type="password" required="" placeholder="<?php echo Core::lang('confirm_password')?>">
                            </div>
                        </div>
                        <input id="key-aaa" name="aaa" type="hidden" class="form-control border-input" value="<?php echo $aaa?>">
                        <input id="key-bbb" name="bbb" type="hidden" class="form-control border-input" value="<?php echo $bbb?>">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="checkbox-signup"> <b><?php echo Core::lang('security_key')?> <?php echo $aaa?> + <?php echo $bbb?> = ?</b></label>
                                <input id="post-key" class="form-control" type="text" required="" placeholder="<?php echo Core::lang('input_security_key')?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox-signup" type="checkbox" required="">
                                    <label for="checkbox-signup"> <?php echo Core::lang('i_agree')?> <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo Core::lang('terms')?></a></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo Core::lang('register')?></button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div><?php echo Core::lang('have_account')?> <a href="modul-login.php" class="text-info m-l-5"><b><?php echo Core::lang('login')?></b></a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- terms modal content -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-themecolor" id="myLargeModalLabel"><i class="mdi mdi-shield-outline"></i> <?php echo Core::lang('terms')?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <?php echo Core::lang('modal_terms')?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><?php echo Core::lang('close')?></button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include_once 'global-js.php';?>
</body>

</html>