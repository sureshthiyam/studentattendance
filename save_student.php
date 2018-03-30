<?php
include 'config.php';
if(isset($_POST['savebtn']))
{
$id=$_POST['student_id'];
$student_name=$_POST['student_name'];
$roll_no=$_POST['roll_no'];
$course=$_POST['course'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$category=$_POST['category'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];


    if($id==0)
    {
        $sql="INSERT INTO `student`(`student_name`, `roll_no`, `course`, `fname`, `mname`, `gender`, `address`, `category`, `email`, `mobile`, `IsActive`) VALUES('$student_name','$roll_no','$course','$fname','$mname','$gender','$address','$category','$email','$moblie',1)";
    }
    else
    {
        $sql="UPDATE student set student_name='$student_name',roll_no='$roll_no',course='$course',fname='$fname',mname='$mname',gender='$gender',address='$address',category='$category',email='$email', mobile='$mobile' WHERE student_id=$id";
    }

    $result=mysqli_query($link, $sql);
    if($result)
    {
        $msg= "successfully save!";
    }
    else
    {
        $msg= "something went wrong!";
    }
    session_start();
    $_SESSION['msg']=$msg;
    session_commit();
    header("Location:add_student.php");
    }


