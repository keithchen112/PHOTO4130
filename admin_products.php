<?php
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
                  <td class='first_name'><span>$sku</span></td>
                  <td class='last_name'><span>$title</span></td>
                  <td class='user_name'><span>$qty</span></td>
                  <td class='user_name'><span>$$price</span></td>
                  </tr>";
            }
            
            echo $html;
            return;

        } else if(Utils::isPOST()) {
        // post means either to delete or add a user
        $parameters = new Parameters("POST");

        $action = $parameters->getValue('action');

        //$data = array("action" => $action, "user_name" => $user_name);
        if($action == 'add') {
            $newSKU = $parameters->getValue('newSKU');
            $newTitle = $parameters->getValue('newTitle');
            $newPrice = $parameters->getValue('newPrice');
            $newQty = $parameters->getValue('newQty');

            if(!empty($newSKU) && !empty($newTitle) && !empty($newPrice) && !empty($newQty)) {
                $data = array("status" => "success", "msg" => "Product added.");
                $um = new ProductManager();
                $um->addAdminProduct($newSKU, $newTitle, $newPrice, $newQty);

            } else {
                $data = array("status" => "fail", "msg" => "First name, last name, and user name cannot be empty.");
            }
            echo json_encode($data, JSON_FORCE_OBJECT);
            return;

        }else {
            $data = array("status" => "fail", "msg" => "Action not understood.");
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
        return;

    } else {
            $data = array("status" => "error", "msg" => "Only GET allowed.");
        }

        echo json_encode($data, JSON_FORCE_OBJECT);

?>