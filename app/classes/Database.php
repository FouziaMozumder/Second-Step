<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 13/12/2021
 * Time: 11:18
 */

namespace App\classes;


class Database
{
    private $hostName;
    private $password;
    private $username;
    private $dbName;
    private $link;

    protected function connect()
    {
        $this->hostName = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbName   = 'php_crud';
        $this->link     = mysqli_connect($this->hostName,$this->username,$this->password,$this->dbName);
        if($this->link)
        {
            return $this->link;
        }
        else
        {
            die('connection failed');
        }
    }
}