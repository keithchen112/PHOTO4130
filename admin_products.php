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
                  <td class='sku'><span>$sku</span></td>
                  <td class='title'><span>$title</span></td>
                  <td class='qty'><span>$qty</span></td>
                  <td class='price'>$<span>$price</span></td>
                  <td><input id='d-$sku' class='delete' type='button' value='Delete'/></td>
                  <td><input id='u-$sku' class='update' type='button' value='Update'/></td>
                  </tr>";
            }
            
            echo $html;
            return;

        } else if(Utils::isPOST()) {
        // post means either to delete or add a user
        $parameters = new Parameters("POST");

        $action = $parameters->getValue('action');
        $sku = $parameters->getValue('SKU');
            
        if($action == 'delete' && !empty($sku)) {

            $um = new ProductManager();
            $um->deleteProduct($sku);
            $data = array("status" => "success", "msg" => "Product '$sku' deleted.");
            echo json_encode($data, JSON_FORCE_OBJECT);
            return;

        } else if($action == 'update' && !empty($sku)) {
            $newTitle = $parameters->getValue('newTitle');
            $newQty = $parameters->getValue('newQty');
            $newPrice = $parameters->getValue('newPrice');

            if(!empty($newTitle)) {

                $um = new productManager();
                $countTitle = $um->updateProductTitle($sku, $newTitle);
                $countQty = $um->updateProductQty($sku, $newQty);
                $countPrice = $um->updateProductPrice($sku, $newPrice);
                
                if($countTitle > 0) {
                    $data = array("status" => "success", "msg" =>
                        "Product '$sku' been updated to ('$newTitle','$newQty').");
                } else if($countQty > 0) {
                    $data = array("status" => "success", "msg" =>
                        "Product '$sku' been updated to ('$newTitle','$newQty').");
                } else if($countPrice > 0) {
                    $data = array("status" => "success", "msg" =>
                        "Product '$sku' been updated to ('$newTitle','$newQty').");
                } else {
                    $data = array("status" => "fail", "msg" =>
                        "Product '$sku' was NOT updated ('$newTitle').");
                }
            } else {
                $data = array("status" => "fail", "msg" =>
                    "New user name must be present - value was '$newTitle' for '$sku'.");
            }
            echo json_encode($data, JSON_FORCE_OBJECT);
            return;

        } else if($action == 'add') { //$data = array("action" => $action, "user_name" => $user_name);
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