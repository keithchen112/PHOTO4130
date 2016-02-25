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
                        <td data-sku-desc='$sku'>$desc</td>
                        <td><input data-sku-qty='$sku' type='number' value='1' min='1' max='10' step='1'/></td>
                        <td data-sku-price='$sku'>$price</td>
                        <td><input data-sku-add='$sku' type='button' value='Add'/></td>
                      </tr>";
            }
            
            echo $html;
            return;

        }
?>