<?php
require_once '../vendor/autoload.php';
use App\classes\Student;
use App\classes\Auth;

if(isset($_POST['btn']))
{
    $student = new Student($_POST);
    $message = $student->save();
    include 'user.php';
}

else if (isset($_GET['status']))
{
    if ($_GET['status'] == 'manageUser')
    {
        $student = new Student();
        $students = $student->getAllStudentInfo();
        include 'manageUser.php';
    }

    else if ($_GET['status'] == 'edit')
    {
        $id = $_GET['id'];
        $student = new Student();
        $productInfo = $student->getStudentInfoById($id);
        extract($productInfo);
        include 'editUser.php';
    }
    else if ($_GET['status'] == 'delete')
    {
        $id = $_GET['id'];
        $student = new Student();
        $student->deleteStudent($id);
    }

    else if($_GET['status'] == 'index')
    {
        $student = new Student();
        $students = $student->getAllStudentInfo();
        include "login.php";
    }
    else if ($_GET['status'] == 'logout') {
        $auth = new Auth();
        $auth->logout();
    }
}
else if(isset($_POST['updateBtn']))
{
    $id             = $_POST['id'];
    $student        = new student($_POST);
    $studentInfo    = $student->getStudentInfoById($id);
    $student->UpdateStudentInfo($studentInfo);
}

else if(isset($_POST['loginBtn']))
{
    $auth = new Auth($_POST);
    $message = $auth->login();
    include "login.php";
}





