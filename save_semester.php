<?php
include 'config.php';
$sid=$_POST['semester_id'];
$semester_name=$_POST['semester_name'];

if($sid==0){
    $sql="INSERT INTO semester(semester_name,IsActive) VALUES('$semester_name',1)";
}else{
    $sql="UPDATE semester set semester_name='$semester_name' WHERE semester_id=$sid";
}

$result=mysqli_query($link, $sql);
if($result){
    $msg= "Successfully save!";
}else{
    $msg= "Something went wrong!";
}
session_start();
$_SESSION['msg']=$msg;
session_commit();
header("Location:semester_master.php");
?>

