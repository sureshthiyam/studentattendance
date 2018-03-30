<?php
$dbhost= 'localhost';
$dbuser= 'root';
$dbpass= '';
$db= 'attendance';


$link= mysqli_connect("localhost", "root", "", "attendance_system");
if (!$link)
{
    die('Could nt connect :'.mysqli_error().' this is error');
}
?>