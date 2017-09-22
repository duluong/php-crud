<?php
class Database{
    public $dbConn;

    public function getConnection(){
        // specify your own database credentials
        // pls change value by your database configuration.
        $host        = "host =127.0.0.1";
        $port        = "port =5432";
        $dbname      = "dbname =postgres";
        $credentials = "user = ec2-user password=12345";

        $this->dbConn = null;

        try{
            $this->dbConn = pg_connect( "$host $port $dbname $credentials" );
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->dbConn;
    }
}
?>