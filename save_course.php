<?php
include 'config.php';
$cid=$_POST['course_id'];
$course_name=$_POST['course_name'];

if($cid==0){
    $sql="INSERT INTO course(course_name,IsActive) VALUES('$course_name',1)";
}else{
    $sql="UPDATE course set course_name='$course_name' WHERE course_id=$cid";
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
header("Location:course_master.php");
?>

