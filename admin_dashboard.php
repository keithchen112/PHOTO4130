<?php


    require_once('./libs/PHPTAL-1.3.0/PHPTAL.php');

    // render the whole page using PHPTAL

    // finally, create a new template object
    $template = new PHPTAL('admin_dashboard.xhtml');

    // now add the variables for processing and that you created from above:
    $template->main_page = "ADMIN DASHBOARD";


    // execute the template
    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }
 require_once('php/init.php');
    loadScripts();

        $data = array("status" => "not set!");

        if(Utils::isGET()) {
            $pm = new ProductManager();
            $rows = $pm->listAdminProducts();

            $html = "";
            foreach($rows as $row) {
                $sku = $row['SKU'];
                $title = $row['title'];
                $price = $row['item_price'];
                $desc = $row['description'];
                $qty = $row['qty'];
                $html .= "<tr>
                <td>$sku</td>
                <td>$title</td>
                <td>$qty</td>
                <td>$price</td>
                </tr>";
            }
            
            echo $html;
            return;

        } else {
            $data = array("status" => "error", "msg" => "Only GET allowed.");

        }

        echo json_encode($data, JSON_FORCE_OBJECT);

?>