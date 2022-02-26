<?php
require_once '../vendor/autoload.php';
use App\classes\Product;
use App\classes\Auth;

if(isset($_POST['btn']))
{
    $product = new product($_POST,$_FILES);
    $message = $product->save();
    include 'user.php';
}

else if(isset($_GET['status']))
{
    if($_GET['status'] == 'manage')
    {
        $product = new product;
        $products = $product->getAllProductInfo();
        include 'manage.php';
    }
    else if($_GET['status'] == 'edit')
    {
        $id = $_GET['id'];
        $product = new Product();
        $ProductInfo = $product->getProductInfoById($id);
        extract($ProductInfo);
        include 'edit.php';
    }
    else if($_GET['status'] == 'delete')
    {
        $id = $_GET['id'];
        $product = new Product();
        $product->deleteProduct($id);
    }
    else if($_GET['status'] == 'index')
    {
        $product = new Product();
        $products = $product->getAllProductInfo();
        include "login.php";
    }
    else if($_GET['status'] == 'detail')
    {
        $id = $_GET['id'];
        $product = new Product();
        $productInfo = $product->getProductInfoById($id);
        include "detail.php";
    }
    else if($_GET['status'] == 'logout')
    {
        $auth = new Auth();
        $auth-> logout();
    }
}

else if(isset($_POST['updateBtn']))
{
    $id             = $_POST['id'];
    $product        = new product($_POST,$_FILES);
    $productInfo    = $product->getProductInfoById($id);
    $product->UpdateProductInfo($productInfo);
}
else if(isset($_POST['loginBtn']))
{
    $auth = new Auth($_POST);
    $message = $auth->login();
    include "login.php";
}

else if(isset($_POST['regBtn']))
{
    $auth = new Auth($_POST);
    $message = $auth->login();
    include "regPage.php";
}
