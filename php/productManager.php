<?php 

class ProductManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function listProducts() {
        $sql = "SELECT SKU, title, item_price, description, qty FROM product";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function listAdminProducts() {
        $sql = "SELECT SKU, title, item_price, description, qty FROM product";
        $rows = $this->db->query($sql);
        return $rows;
    }
    
    public function addAdminProduct($SKU, $title, $item_price, $qty) {
        $sql = "INSERT INTO product (SKU, title, item_price, qty)
            VALUES ('$SKU', '$title', '$item_price', '$qty')";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    
    public function deleteProduct($login) {
        $sql = "DELETE FROM product WHERE SKU = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    
    public function updateProductTitle($login, $newTitle) {
        $sql = "UPDATE product SET title = '$newTitle' WHERE SKU = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    
    public function updateProductQty($login, $newQty) {
        $sql = "UPDATE product SET qty = '$newQty' WHERE SKU = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    
    public function updateProductPrice($login, $newPrice) {
        $sql = "UPDATE product SET item_price = '$newPrice' WHERE SKU = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    
    
    /*
    public function updateProductTitle($login, $newTitle) {
        $sql = "UPDATE product SET title = '$newTitle' WHERE SKU = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    
    public function updateProductTitle($login, $newTitle) {
        $sql = "UPDATE product SET title = '$newTitle' WHERE SKU = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    */
    /*
    public function findProduct($SKU) {
        $params = array(":sku" => $SKU);
        $sql = "SELECT SKU, item_price, description FROM product WHERE SKU = :sku";

        $rows = $this->db->query($sql, $params);
        if(count($rows) > 0) {
            return $rows[0];
        }

        return null;
    }*/
    
}



?>