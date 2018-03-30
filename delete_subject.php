<?php
include 'config.php';
if(isset($_GET['subject_id'])){
    $sid=$_GET['subject_id'];
    $sql="DELETE FROM subject WHERE subject_id=$sid";
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
header("Location:subject_master.php");
?>
