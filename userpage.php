<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID 14623
 * Date: 2/20/2019
 * Time: 11:39 PM
 */

include ('DBConnection.php');

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['email']) &&
                isset($_POST['password'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $instance = DBConnection::getInstance();
    $conn = $instance->getConnection();

    $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
    $result = $conn->query($sql);

    if (!empty($result)) {
        echo "<script type='text/javascript'>alert('An account is already registered with this email. Please sign in or another email address.');";
        echo "window.location.href = 'index.php';";
        echo "</script>";
    } else {
        $stmt = $conn->prepare('INSERT INTO users (email, password, name, surname, phone) VALUES (?,?,?,?,?)');
        $stmt->bind_param('sssss', $email, $password, $name, $surname, $phone);
        $stmt->execute();

        echo "<script type='text/javascript'>alert('Registration successful!');</script>";
    }
}

?>


<!-- Elena16!->