<?php
/**
 * Created by PhpStorm.
 * User: Elena
 * Date: 2/23/2019
 * Time: 11:01 PM
 */


class UserService
{
    private $_userid;
    private $_name;
    private $_surname;
    private $_phone;
    private $_email;
    private $_password;

    public function __construct($userId, $name, $surname, $phone, $email, $password)
    {
        $this->_userid = $userId;
        $this->_name = $name;
        $this->_surname = $surname;
        $this->_phone = $phone;
        $this->_email = $email;
        $this->_password = $password;
    }

    public function getUserId()
    {
        return $this->_userid;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getSurname()
    {
        return $this->_surname;
    }

    public function getPhone()
    {
        return $this->_phone;
    }

    public function getEmail()
    {
        return $this->_email;
    }
}