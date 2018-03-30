<?php
include '../config.php';

$sql="SELECT `semester_id`, `semester_name` FROM `semester` WHERE IsActive=1";

$result=mysqli_query($link,$sql);
$semester=array();
if($result){
    while ($row=mysqli_fetch_assoc($result)){
        $data=array();
        $data["ID"]=$row['semester_id'];
        $data["NAME"]=$row['semester_name'];
        $semester[]=$data;
        
    }
    $output["semester"]=$semester;
    echo json_encode($output);
}
