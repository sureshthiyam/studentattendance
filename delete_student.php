<?php
include 'config.php';
if(isset($_GET['id'])){
    $sid=$_GET['id'];
    $sql="DELETE FROM view_all_students WHERE id=$sid";
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
header("Location:viewstudents.php");
?>