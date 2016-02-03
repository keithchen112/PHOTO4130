<?php

function loadScripts() {

$scripts = array('connection.php',    
                 'product.php');

    $subDir = "php";

    foreach($scripts as $script) {
        require_once($subDir . DIRECTORY_SEPARATOR. $script);
    }

}

?>