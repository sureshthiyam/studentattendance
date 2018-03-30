<?php
include '../config.php';

$sql="SELECT `subject_id`, `subject_name` FROM `subject` WHERE IsActive=1";

$result=mysqli_query($link,$sql);
$subject=array();
if($result){
    while ($row=mysqli_fetch_assoc($result)){
        $data=array();
        $data["ID"]=$row['subject_id'];
        $data["NAME"]=$row['subject_name'];
        $subject[]=$data;
        
    }
    $output["subject"]=$subject;
    echo json_encode($output);
}
