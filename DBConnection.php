<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/21/2018
 * Time: 8:10 PM
 */

class DBConnection
{

    //Hold the connection instance
    private static $_instance;
    private $_connection;
    private $_servername = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_dbname = "accommodationdb";

    //Private constructor to prevent initiation from outer code
    private function __construct()
    {
        //Create connection
        $this->_connection = new mysqli($this->_servername, $this->_username,
            $this->_password, $this->_dbname);

        //Check connection
        if (!$this->_connection) {
            die("Connection failed: " . mysqli_connect_error());
            echo "<script>alert('received!')</script>";
        }
        echo "<script>alert('Connected successfully!')</script>";
    }

    //Get an instance of the connection
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    //Method clone is empty to prevent duplication of connection
    private function __clone(){}

    //Get mysqli connection

    public function getConnection(){
        return $this->_connection;
    }

    public function getAllProperties(){
        $result = $this->_connection->query("SELECT * FROM properties ORDER BY date(insertionDate) DESC");
        return $result;
    }
}
