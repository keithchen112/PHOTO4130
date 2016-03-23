<?php
	
    require_once('./libs/PHPTAL-1.3.0/PHPTAL.php');
	require_once('php/init.php');
	loadScripts();
    // render the whole page using PHPTAL
	session_start();

	if (!(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] != '')) {

	header ("Location: admin_login.php");

	} else {
		
	
    // finally, create a new template object
    $template = new PHPTAL('admin_dashboard.xhtml');

    // now add the variables for processing and that you created from above:
    $template->main_page = "PHOTO4130 ADMIN";


    // execute the template
    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }
}
?>