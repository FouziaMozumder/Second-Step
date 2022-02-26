<?php
namespace App\classes;

class Student
{
    private $name;
    private $mobile;
    private $email;
    private $password;
    private $link;
    private $sql;
    private $queryResult;
    private $data = [];
    private $row;
    private $i;

    public function __construct($data = null)
    {
        if($data)
        {
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->password = md5($data['password']);
            $this->mobile = $data['mobile'];
        }
    }
    public function save()
    {
        $this->link= mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            $this->sql = "INSERT INTO students (name,email,password,mobile) VALUES ('$this->name','$this->email','$this->password','$this->mobile')";
            if(mysqli_query($this->link,$this->sql))
            {
                return 'Student info save Successfully';
            }
            else
            {
                die('Query problem..'.mysqli_error($this->link));
            }
        }
    }

    public function getAllStudentInfo()
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        $this->sql = "SELECT * FROM students";
        if(mysqli_query($this->link,$this->sql))
        {
            $this->queryResult = mysqli_query($this->link,$this->sql);
            $this->i = 0;
            while ($this->row = mysqli_fetch_assoc($this->queryResult))
            {
                $this->data[$this->i]['id']     = $this->row['id'];
                $this->data[$this->i]['name']   = $this->row['name'];
                $this->data[$this->i]['email']  = $this->row['email'];
                $this->data[$this->i]['mobile'] = $this->row['mobile'];
                $this->i++;
            }
            return $this->data;
        }
        else
        {
            die('Query Problem'.mysqli_error($this->link));
        }
    }


    public function getStudentInfoById($id)
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            $this->sql = "SELECT * FROM users WHERE id = '$id' ";
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

    public function updateStudentInfo($productInfo)
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {

            $this->sql = "UPDATE users SET name = '$this->name',email = '$this->email',password = '$this->password',mobile = '$this->mobile' WHERE id = '$productInfo[id]' ";
            if (mysqli_query($this->link, $this->sql)) {
                session_start();
                $_SESSION['message'] = "Product info Updated Successfully";
                header('Location: actionUser.php?status=manageUser');
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
    public function deleteStudent($id)
    {
        $this->link = mysqli_connect('localhost','root','','php_crud');
        if($this->link)
        {
            $this->row = $this->getStudentInfoById($id);

            $this->sql = "DELETE FROM users WHERE id = '$id'";
            if(mysqli_query($this->link,$this->sql))
            {
                session_start();
                $_SESSION['message'] = 'product info deleted successfully';
                header('Location: actionUser.php?status=manageUser');
            }
            else
            {
                die('Query problem....'.mysqli_error($this->link));
            }
        }
    }
}