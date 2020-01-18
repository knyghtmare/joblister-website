<?php

require_once "config/config.php";

class Database {
    // code here

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PWD;
    private $dbname = DB_NAME;

    // properties

    private $connection;
    private $error;
    private $stmt;
    private $db_connected = false;


    public function __construct()
    {
        // set PDO connection
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            //code...
            $this->connection = new PDO($dsn, $this->user, $this->pwd, $options);
            $this->db_connected = true;
        } catch (PDOException $e) {
            //throw $th;
            $this->error =$e->getMessage().PHP_EOL;
        }
    }

    public function getError()
    {
        return $this->error;
    }

    public function isConnected()
    {
        return $this->db_connected;
    }

    // prepare statement with query
    public function query($query)
    {
        $this->stmt = $this->connection->prepare($query);
    }

    // execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    // get the results as
    // an array
    public function getResults()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get record row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    // get a single record as object
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function bind($param, $value, $type = null)
    {
        if ( is_null($type) )
        {
            switch(true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
}

 ?>
