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

    public function searchProduct($name, $description, $price){
        $sql = "select * from PRODUCT where true ";

        if ($name){
            $sql .= "AND name like '%$name%' ";
        }

        if ($description){
            $sql .= "AND description = '%$description%' ";
        }

        if ($price){
            $sql .= "AND price = '%$price%' ";
        }

        $sql .= "; ";

        $ret = pg_query($this->dbConn, $sql);
        if(!$ret) {
            echo "Can't get product infor";
        }
        return $ret;
    }

    public function addProduct($name, $description, $price){
        $now = (new DateTime())->format('Y-m-d H:i:s');
        $sql = "insert into PRODUCT('name', 'description', 'price', 'created', 'modified') Values($name, $description, $price, $now, $now) ;";

        $ret = pg_query($this->dbConn, $sql);

        if(!$ret) {
            echo "Can't add product infor";
        }
        return $ret;
    }

    public function updateProduct($id, $name, $description, $price){
        $now = (new DateTime())->format('Y-m-d H:i:s');
        $sql = "update PRODUCT set name=$name, 'description'=$description, price=$price, modified=$now where id=$id ;";

        $ret = pg_query($this->dbConn, $sql);

        if(!$ret) {
            echo "Can't update product infor";
        }
        return $ret;
    }

    public function deleteProduct($id){
        $sql = "delete PRODUCT where id=$id ;";

        $ret = pg_query($this->dbConn, $sql);

        if(!$ret) {
            echo "Can't delete product infor";
        }
        return $ret;
    }
}
?>
