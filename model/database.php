<?php
class Database{
 
    // specify your own database credentials
    public $conn;

    public function getConnection(){
        // pls change value by your database configuration.
        $host        = "host =127.0.0.1";
        $port        = "port =5432";
        $dbname      = "dbname =postgres";
        $credentials = "user = ec2-user password=12345";

        $this->conn = null;

        try{
            $this->conn = pg_connect( "$host $port $dbname $credentials" );
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>