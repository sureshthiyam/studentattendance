<?php
include 'config.php';
$sid=$_POST['session_id'];
$session_name=$_POST['session_name'];

if($sid==0){
    $sql="INSERT INTO session(session_name,IsActive) VALUES('$session_name',1)";
}else{
    $sql="UPDATE session set session_name='$session_name' WHERE session_id=$sid";
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
header("Location:session_master.php");
?>
