<?php
include_once 'database.php';

class Product{
    
    private $dbConn;

    function __construct(){
       $db = new Database();
       $this->dbConn = $db->getConnection();
    }

    public function getAllProducts(){
        $sql = "select * from PRODUCT ;";

        $ret = pg_query($this->dbConn, $sql);

        if(!$ret) {
            echo "Can't get product infor";
        }
        return $ret;
    }

    /*public function searchProduct($name, $description, $price){
        $sql = "select * from PRODUCT where true ";

        if ($name){
            $sql .= "AND name = ? ";
        }

        if ($description){
            $sql .= "AND description = ? ";
        }

        if ($price){
            $sql .= "AND price = ? ";
        }

        $sql .= "; ";

        $ret = pg_query($conn, $sql);

        if(!$ret) {
            echo "Can't get product infor";
        }
        return $ret;
    }*/
}
?>