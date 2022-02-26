<?php

namespace App\classes;
class Front
{
    public function index()
    {
        header('Location: pages/actionUser.php?status=index');
    }
}