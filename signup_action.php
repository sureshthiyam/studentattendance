<?php
include 'config.php';
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$conpass=$_POST['conpass'];



if($pass!=$conpass){
    session_start();
    $_SESSION['msg']="Password not match!";
    session_commit();
    header("Location:signup.php");
    return;
}


$sql="SELECT id,name FROM login WHERE email='$email' AND IsActive=1";

$result= mysqli_query($link, $sql);

$id=0;
if($result){
    while($row= mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        $name=$row['name'];
    }
    
}

if($id!=0){
    
    session_start();
    $_SESSION['msg']="User already exist!";
    session_commit();
    header("Location:signup.php");
    
}else{
    $sql="INSERT INTO `login`( `name`, `email`, `password`, `IsActive`)
			VALUES ('$name','$email','$pass',1)";
    
    $save= mysqli_query($link, $sql);
    
    if($save){
        
        $msg="Successfully registered!";
    }else{
        $msg="Something went wrong!";
    }
    session_start();
    $_SESSION['msg']=$msg;
    session_commit();
    header("Location:signup.php");
}



?>
