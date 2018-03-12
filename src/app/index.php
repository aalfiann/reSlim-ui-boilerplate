<?php
// Load all classes
spl_autoload_register(function ($classname) {require ( $classname . ".php");});
// Verify session, cookies and token
$datalogin = Core::checkSessions();
// Redirect to role page
$indexrole = Core::getRole($datalogin['token']);
if ($indexrole < '3') {
    Core::goToPage('modul-dashboard.php');
} else if ($indexrole == '3'){
    Core::goToPage('modul-dashboard-mine.php');
} else {
    Core::goToPage('modul-user-profile.php');
} 

?>