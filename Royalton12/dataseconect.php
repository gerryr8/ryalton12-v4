<?php
$servername = "localhost";
$database = "hotel";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn) {
    
}else{
   die("Connection failed:" . mysqli_connect_error()); 
}

?>