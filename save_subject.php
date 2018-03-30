<?php
include 'config.php';
$sid=$_POST['subject_id'];
$subject_name=$_POST['subject_name'];

if($sid==0){
    $sql="INSERT INTO subject(subject_name,IsActive) VALUES('$subject_name',1)";
}else{
    $sql="UPDATE subject set subject_name='$subject_name' WHERE subject_id=$sid";
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
header("Location:subject_master.php");
?>
