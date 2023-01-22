<?php
namespace APP;

use PDO;
use PDOException;
class Database{


    private $host = 'localhost';
    private $user=  'root';
    private $dbpwd= '';
    private $dbname ='products';
    protected $connection;
    protected $errors;
    protected $stmt;
    private $dbconnected = false;

    public function __construct()
    {
        // set PDO CONNECTION
        $dsn='mysql:host=' .$this->host . ';dbname='.$this->dbname;

        $options = array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        );


        try
        {
           $this->connection = new PDO($dsn,$this->user, $this->dbpwd,$options);
        }
        catch(PDOException $e)
        {
            $this->errors = $e->getMessage(). "<br>";

        }
    }

    public function getError(){
        return $this->errors;
    }


    public function isConnected(){
        return $this->dbconnected;
    }

    // prepare statement with query
    public function query($query){
        $this->stmt= $this->connection->prepare($query);
    }
    //   execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    // get array set as Array of object
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    } 

    // get Record Row Count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
     
//    to return single count
    public function singleCount(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function bind($param, $value ){
        $this->stmt->bindValue($param,$value);
    }
}
