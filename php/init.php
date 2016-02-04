<?php

function loadScripts() {

$scripts = array('connection.php',    
                 'productManager.php',
                 'messages.php',
                 'utils.php');

    $subDir = "php";

    foreach($scripts as $script) {
        require_once($subDir . DIRECTORY_SEPARATOR. $script);
    }

}

?>