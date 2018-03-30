<?php
include 'config.php';
if(isset($_GET['student_id'])){
    $id=$_GET['student_id'];
    $sql="DELETE FROM student WHERE student_id=$id";
    $result=mysqli_query($link,$sql);
    if($result){
        $msg="Succesfully deleted!";
    }else{
        $msg="Something went wrong!";
    }
    
}else{
    $msg="Nothing to delete!";
}

session_start();
$_SESSION['msg']=$msg;
session_commit();
header("Location:assign_student.php");
?>