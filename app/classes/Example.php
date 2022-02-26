<?php


namespace App\classes;

class Example
{
    public function __construct()
    {

    }
    public function index()
    {
        header('location:pages/home.php');
    }

}