<?php
// connection to database includes three variables....
$servername="localhost";
$username="root";
$password="";
$database="crud";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry we failed to connect ". mysqli_connect_error());
}
else{
    echo "You are Connected Successfully";
}
?>