<?php
include '../config.php';

$sql="SELECT `course_id`, `course_name` FROM `course` WHERE IsActive=1";

$result=mysqli_query($link,$sql);
 $course=array();
if($result){
    while ($row=mysqli_fetch_assoc($result)){
        $data=array();
        $data["ID"]=$row['course_id'];
        $data["NAME"]=$row['course_name'];
        $course[]=$data;
       
    }
    $output["course"]=$course;
    echo json_encode($output);
}
//http://localhost/Attendance_System/mobile/getCourse.php