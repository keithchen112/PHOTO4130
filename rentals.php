<?php


    require_once('./libs/PHPTAL-1.3.0/PHPTAL.php');

    // render the whole page using PHPTAL

    // finally, create a new template object
    $template = new PHPTAL('rentals.xhtml');

    // now add the variables for processing and that you created from above:
    $template->main_page = "PHOTO4130 RENTALS";


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
            $rows = $pm->listProducts();

            $html = "";
            foreach($rows as $row) {
                $sku = $row['SKU'];
                $price = $row['item_price'];
                $desc = $row['description'];
                $html .= "
                <div class='container'>
                    <div class='row'>
                        <div class='four columns'>
                            <a href='#'><img src='http://placehold.it/250x250' alt='' style='width: 100%;'/></a>
                        </div>
                        <div class='six columns'>
                            <h3>$sku</h3>
                            <p>$desc</p>
                        </div>
                        <div class='two columns'>
                            <div class='row'>
                                <button class='quantity_button' disabled='true'>$$price</button>
                            </div>
                            <div class='row'>
                                <button data-sku-add='$sku' class='add_button'>ADD</button>
                            </div>
                            <div class='row'>
                                <button class='quantity_button' disabled='true'>1 LEFT</button>
                            </div>
                        </div>
                    </div>
                </div>
        
        <br/>";
            }
            echo $html;
            return;

        } else {
            $data = array("status" => "error", "msg" => "Only GET allowed.");

        }

        echo json_encode($data, JSON_FORCE_OBJECT);


?>