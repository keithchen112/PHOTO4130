<?php

function loadScripts() {

$scripts = array('connection.php',    
                 'productManager.php',
                 'messages.php',
                 'parameters.php',
                 'utils.php',
                 'cartManager.php',
                 'admin_login_action.php',
				 'admin_login_profile.php',
				 'admin_logout_action.php',
                 'session.php',
                 'user_manager.php'
                 );

    $subDir = "php";

    foreach($scripts as $script) {
        require_once($subDir . DIRECTORY_SEPARATOR. $script);
    }

}

?>