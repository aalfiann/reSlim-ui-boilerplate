<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">

<head>
    <?php include_once 'global-meta.php';?>
    <title><?php echo Core::lang('verify_password')?> - <?php echo Core::getInstance()->title?></title>
</head>

<body>
    <?php include_once 'global-preloader.php';?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">>
                <?php
                    if (isset($_POST['submitnewpassword'])){
                        if ($_POST['password1'] == $_POST['password2']){
                            $post_array = array(
                            	'PassKey' => (empty($_GET['passkey'])?'':$_GET['passkey']),
                            	'NewPassword' => $_POST['password2']
                            );
                            Core::verifyPassKey(Core::getInstance()->api.'/user/verifypasskey',$post_array);
                        } else {
                            echo Core::getMessage('danger',Core::lang('core_change_password_failed'),Core::lang('not_match_password'));
                        }
                    } 
                ?>
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" action="<?php $_SERVER['PHP_SELF']?>">
                        <h3 class="box-title m-b-20"><?php echo Core::lang('verify_password')?></h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input name="password1" class="form-control" type="password" required="" placeholder="<?php echo Core::lang('new_password')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="password2" class="form-control" type="password" required="" placeholder="<?php echo Core::lang('confirm_password')?>">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button name="submitnewpassword" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo Core::lang('submit_reset_password')?></button>
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
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include_once 'global-js.php';?>
</body>

</html>