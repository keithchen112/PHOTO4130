<?php 


    require_once('./libs/PHPTAL-1.3.0/PHPTAL.php');

    $template = new PHPTAL('cart.xhtml');

    // now add the variables for processing and that you created from above:
    $template->main_page = "PHOTO4130 CART";

    // execute the template
    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }


?>