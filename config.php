<?php
$servername="localhost";
$username="root";
$password="";
$dbname="rioxsys";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die ("connection failed");
}
echo "connection succesfull";


?>
