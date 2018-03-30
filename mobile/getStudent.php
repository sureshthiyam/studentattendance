<?php
include '../config.php';
$session_id=$_GET['session_id'];
$semester_id=$_GET['sem_id'];
$course_id=$_GET['course_id'];

$sql="SELECT 
ST.student_id AS ID,
ST.student_name AS studentName,
ST.roll_no AS Roll
FROM student_col_relation SCR
LEFT JOIN student ST ON ST.student_id=SCR.student_id

WHERE SCR.session_id='$session_id' and SCR.sem_id='$semester_id' and SCR.course_id='$course_id' and ST.IsActive=1";


$result=mysqli_query($link,$sql);
$student=array();
if($result){
    while ($row=mysqli_fetch_assoc($result)){
        $data=array();
        $data["ID"]=$row['ID'];
        $data["NAME"]=$row['studentName'];
        $data["ROLL"]=$row['Roll'];
        $student[]=$data;
       
    }
    $output["student"]=$student;
    echo json_encode($output);
}


//json url for webservice
//http://localhost/attendance_system/mobile/getStudent.php?session_id=1&sem_id=1&course_id=1


