<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
if (empty($_GET['code'])){
    $httpcode = '404';
} else {
    if($_GET['code'] == '400' || $_GET['code'] == '401' || $_GET['code'] == '403' || $_GET['code'] == '404' || $_GET['code'] == '429' || $_GET['code'] == '451'){
        $httpcode = $_GET['code'];
    } else {
        $httpcode = '404';
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">

<head>
    <?php include_once 'global-meta.php';?>
    <title><?php echo $httpcode.' - '.Core::lang('http_title_'.$httpcode).' - '.Core::getInstance()->title?></title>
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1><?php echo $httpcode?></h1>
                <h3 class="text-uppercase"><?php echo Core::lang('http_title_'.$httpcode)?></h3>
                <p class="text-muted m-t-30 m-b-30"><?php echo Core::lang('http_message_'.$httpcode)?></p>
                <a href="index.php" class="btn btn-themecolor btn-rounded waves-effect waves-light m-b-40"><?php echo Core::lang('http_back_home')?></a> </div>
            <footer class="footer text-center">&copy; <script>document.write(new Date().getFullYear())</script> <?php echo Core::getInstance()->title;?></footer>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/bootstrap/js/popper.min.js"></script>

    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <script>
        /* Init theme style */
        var getTheme = "blue";
        function loadTheme(themestyle="blue"){
            link=document.createElement("link");
            link.id="theme";
            link.href="css/colors/"+themestyle+".css";
            link.rel="stylesheet";
            document.getElementsByTagName("head")[0].appendChild(link);
        }
        function setTheme(getTheme){
            localStorage.setItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme",getTheme);
            console.log("Saving theme "+getTheme+"...");
        }
        function checkActiveTheme(classTheme){
            var selection = document.getElementById("themecolors") !== null;
            if (selection){
                document.getElementById("themecolors").querySelector("ul > li > a."+classTheme+"-theme").className = classTheme+"-theme working";
            }
        }
        /* Check localstorage */
		if (localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme") == "" || localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme") == "undefined") {
			console.log("Using default theme blue...");
			getTheme = "blue";
		} else {
			if (!localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme")) {
                localStorage.setItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme", "blue");
                getTheme = "blue";
                console.log("Using default theme blue...");
			} else {
                getTheme = localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme");
                console.log("Last time choosing theme: "+localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme"));
			}
        }
        loadTheme(getTheme);
        checkActiveTheme(getTheme);
    </script>
</body>

</html>
