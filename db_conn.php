<?php 
$name="localhost";
$uname="root";
$password="";

$conn=mysqli_connect($name,$uname,$password,"val_db");

if(!$conn){
    die(mysqli_error($conn));
}

?>