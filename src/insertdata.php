<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'np';
$port = NULL;
$socket = NULL;
$connect = mysqli_connect($hostname, $username, $password, $database);
if(!$connect){
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว : " . mysqli_connect_error($connect));
}else{
    mysqli_set_charset($connect, 'utf8');
}

$Name=$_POST["Name"];
$Phone=$_POST["Phone"];

$sql = "INSERT INTO nds (Name,Phone) VALUES('$Name','$Phone')";

if (mysqli_query($connect, $sql)) {}
    header("Location: index.php");
    exit();

?>