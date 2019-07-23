<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/21/2018
 * Time: 8:10 PM
 */

include ('UserService.php');

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
        }
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
    private function __clone()
    {
    }

    //Get mysqli connection
    public function getConnection()
    {
        return $this->_connection;
    }

    public function getAllProperties()
    { //todo change properties with houses or vice versa
        $result = $this->_connection->query("SELECT * FROM properties ORDER BY date(insertionDate) DESC");
        return $result;
    }

    public static function validSignIn($email, $password)
    {
        $instance = DBConnection::getInstance();
        $conn = $instance->getConnection();
        $validLogin = false;

        $stmt = $conn->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        $stmt->bind_param('ss', $email, $password);

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();

        if ($row) {
            $userId = $row['userid'];
            $name = $row['name'];
            $surname = $row['surname'];
            $phone = $row['phone'];
            $email = $row['email'];
            $password = $row['password'];
            $user = new UserService($userId, $name, $surname, $phone, $email, $password);
            $_SESSION['user'] = $user;   //calling $_SESSION['user'] returns the current user

            $validLogin = true;
            echo $validLogin;
        } else {
            echo $validLogin;
        }
    }

    public static function checkIfMailAlreadyExists($email)
    {
        $instance = DBConnection::getInstance();
        $conn = $instance->getConnection();
        $mailExists = 1;

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {  //If there are results it means that the email is already been taken
            echo $mailExists;
        } else {    //Mail does not already exist
            $mailExists = 0;
            echo $mailExists;
        }
    }

    public static function insertNewUserIntoDB($email, $password, $name, $surname, $phone)
    {
        $instance = DBConnection::getInstance();
        $conn = $instance->getConnection();

        $stmt = $conn->prepare('INSERT INTO users (email, password, name, surname, phone) VALUES (?,?,?,?,?)');
        $stmt->bind_param('sssss', $email, $password, $name, $surname, $phone);
        $result = $stmt->execute();

        if ($result) {
            //Gets the id of the inserted user
            $conn->query("SELECT LAST_INSERTED_ID()");
            $userId = $conn->insert_id;
            $user = new UserService($userId, $name, $surname, $phone, $email, $password);
            $_SESSION['user'] = $user;   //calling $_SESSION['user'] returns the current user
        }

        echo $result;
    }
}

if (isset($_POST['functionToCall']) && !empty($_POST['functionToCall'])) {
    $functionToCall = $_POST['functionToCall'];

    switch ($functionToCall) {

        case 'checkIfMailAlreadyExists' :
            $email = $_POST['emailAddress'];
            DBConnection::checkIfMailAlreadyExists($email);
            break;
        case 'insertNewUserIntoDB' :
            $name = $_POST['nameValue'];
            $surname = $_POST['surnameValue'];
            $phone = $_POST['phoneValue'];
            $email = $_POST['emailAddress'];
            $password = $_POST['passwordValue'];
            DBConnection::insertNewUserIntoDB($email, $password, $name, $surname, $phone);
            break;

        case 'validSignIn' :
            $email = $_POST['emailAddress'];
            $password = $_POST['passwordValue'];
            DBConnection::validSignIn($email, $password);
            break;

        case 'other' : // do something;break;
            // other cases
    }
}



