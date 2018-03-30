<?php
include 'config.php';
if(isset($_GET['semester_id'])){
    $sid=$_GET['semester_id'];
    $sql="DELETE FROM semester WHERE semester_id=$sid";
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
header("Location:semester_master.php");
?>
