<?php
include 'config.php';
if(isset($_GET['session_id'])){
    $sid=$_GET['session_id'];
    $sql="DELETE FROM session WHERE session_id=$sid";
    $result=mysqli_query($link,$sql);
    if($result){
        $msg="Succesfully deleted!";
    }else{
        $msg="Something went wrong!";
    }
    
}else{
    $msg="Nothing to delete!";
}

session_start();
$_SESSION['msg']=$msg;
session_commit();
header("Location:session_master.php");
?>
