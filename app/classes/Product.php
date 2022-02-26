<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/12/2021
 * Time: 10:00
 */

namespace App\classes;


class Product
{
    private $name;
    Private $price;
    Private $stock;
    Private $description;
    Private $imageName;
    Private $directory;
    Private $file;
    Private $link;
    Private $sql;
    Private $queryResult;
    Private $row;
    Private $data = [];
    Private $i;
    private $imgURL;

    public function __construct($data = null, $file = null)
    {
        if($data)
        {
            $this->name        =$data['name'];
            $this->price       =$data['price'];
            $this->stock       =$data['stock'];
            $this->description =$data['description'];
        }
        if($file)
        {
            $this->file = $file;
        }
    }
    protected function getImageURL()
    {
        $this->imageName = $this->file['image']['name'];
        $this->directory = '../assets/image/'.$this->imageName;
        move_uploaded_file($this->file['image']['tmp_name'],$this->directory);
        return $this->directory;
    }

    public function save()
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            if(empty($this->file['image']['name']))
                {
                    $this->imgURL = '';
                }
            else
                {
                    $this->imgURL = $this->getImageURL();
                }

            $this->sql = "INSERT INTO products (name,price,stock,description,image) VALUES ('$this->name','$this->price','$this->stock','$this->description','$this->imgURL')";
            if(mysqli_query($this->link,$this->sql))
            {
                return 'Product info created Successfully';
            }
            else
            {
                die('Query problem....'.mysqli_error($this->link));
            }
        }
    }

    public function getAllProductInfo()
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            $this->sql = "SELECT * FROM products";
            if(mysqli_query($this->link,$this->sql))
            {
                $this->queryResult = mysqli_query($this->link,$this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id']    = $this->row['id'];
                    $this->data[$this->i]['name']  = $this->row['name'];
                    $this->data[$this->i]['price'] = $this->row['price'];
                    $this->data[$this->i]['stock'] = $this->row['stock'];
                    $this->data[$this->i]['image'] = $this->row['image'];
                    $this->i++;
                }
                return $this->data;
            }
            else
            {
                die('Query problem....'.mysqli_error($this->link));
            }
        }
    }

    public function getProductInfoById($id)
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            $this->sql = "SELECT * FROM products WHERE id = '$id' ";
            if (mysqli_query($this->link, $this->sql))
            {
               $this->queryResult = mysqli_query($this->link, $this->sql);
               return mysqli_fetch_assoc($this->queryResult);
            }
            else
            {
                die ('Query problem....'.mysqli_error($this->link));
            }
        }
    }

    public function updateProductInfo($productInfo)
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            if(empty($this->file['image']['name']))
                {

                    $this->imgURL = $productInfo['image'];
                }
            else
                {
                    if(file_exists($productInfo['image']))
                    {
                        unlink($productInfo['image']);
                    }

                    $this->imgURL = $this->getImageURL();
                }
            $this->sql = "UPDATE products SET name = '$this->name',price = '$this->price',stock = '$this->stock',description = '$this->description',image = '$this->imgURL' WHERE id = '$productInfo[id]' ";
            if (mysqli_query($this->link, $this->sql)) {
                session_start();
                $_SESSION['message'] = "Product info Updated Successfully";
                header('Location: action.php?status=manage');
            }
            else
                {
                    die ('Query problem....'.mysqli_error($this->link));
                }
        }
        else
        {
            die ('Connection problem....'.mysqli_error($this->link));
        }
    }
    public function deleteProduct($id)
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            $this->row = $this->getProductInfoById($id);
            if(file_exists($this->row['image']))
            {
                unlink($this->row['image']);
            }
            $this->sql = "DELETE FROM products WHERE id = '$id'";
            if(mysqli_query($this->link,$this->sql))
            {
                session_start();
                $_SESSION['message'] = 'product info deleted successfully';
                header('Location: action.php?status=manage');
            }
            else
            {
                die('Query problem....'.mysqli_error($this->link));
            }
        }
    }
}