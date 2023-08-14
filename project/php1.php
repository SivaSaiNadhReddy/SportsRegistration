<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
$sql = "CREATE TABLE Registration(
    Username varchar(30) PRIMARY KEY,
    password varchar(30) NOT NULL)";
$sql1 = "insert into Registration values('RAINA','Dhoni@7')";
$result = mysqli_query($conn,$sql1);
?>