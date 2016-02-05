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

        } else {
            $data = array("status" => "error", "msg" => "Only GET allowed.");

        }

        echo json_encode($data, JSON_FORCE_OBJECT);

?>