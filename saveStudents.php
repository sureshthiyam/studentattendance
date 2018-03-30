<?php
include 'config.php';
$id=$_POST['ID'];
$roll_no=$_POST['roll_no'];
$student_name=$_POST['student_name'];
$course=$_POST['course'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$address=$_POST['address'];
$email=$_POST['email'];
$moblie=$_POST['mobile'];


if($id==0){
    $sql="INSERT INTO view_all_students(roll_no,student_name,course,fname,mname,address,email,mobile,IsActive) VALUES('$roll_no','$student_name','$course','$fname','$mname','$address','$email','$moblie',1)";
}else{
    $sql="UPDATE view_all_students set roll_no='$roll_no',student_name='$student_name',course='$course',fname='$fname',mname='$mname',address='$address',email='$email', mobile='$mobile' WHERE ID=$id";
}

$result=mysqli_query($link, $sql);
if($result){
    $msg= "successfully save!";
}else{
    $msg= "something went wrong!";
}
session_start();
$_SESSION['msg']=$msg;
session_commit();
header("Location:add_student.php");


