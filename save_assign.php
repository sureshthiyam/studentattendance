<?php
include 'config.php';
$student=$_POST['student'];
$course=$_POST['course'];
$session=$_POST['session'];
$semester=$_POST['semester'];

if($student!=0 && $course!=0 && $session!=0 && $semester!=0)
{
    
        
        $sql="INSERT INTO `student_col_relation`(`student_id`, `sem_id`, `course_id`, `session_id`, `IsActive`)
VALUES('$student','$semester','$course','$session',1)";
  
    
    $result=mysqli_query($link, $sql);
    if($result){
        $msg= "successfully save!";
    }else{
        $msg= "something went wrong!";
    }
    
}else{
    
    $msg= "Select all the fields!";
}


session_start();
$_SESSION['msg']=$msg;
session_commit();
header("Location:assign_student.php");


