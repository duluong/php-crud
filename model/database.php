<?php
class Database{
 
    // specify your own database credentials
    private $host        = "host =127.0.0.1";
    private $port        = "port =5432";
    private $dbname      = "dbname =postgres";
    private $credentials = "user = ec2-user password=12345";

    public $conn;

    public function getConnection(){
        this->conn = null;

        try{
            this->conn = pg_connect( "$host $port $dbname $credentials" );
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return this->conn;
    }
}
?>