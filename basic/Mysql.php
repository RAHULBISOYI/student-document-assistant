<?php  
echo "Welcome to our server<br>";

// Connecting to the database
$server = "localhost";
$username = "root";
$password = "";

// Create connection object
$conn = mysqli_connect($server, $username, $password);
//create a connection
$sql="CREATE DATABASE dbrahull";//basicaly it isfor create a table in the php.myadmin
$result=mysqli_query($conn,$sql);
//echo  "the result is ".$result;
//echo var_dump($result);//this is used for if th equery isexist beforthan it say true ifnot than false;
//echo "<br>";

// Check connection
if (!$conn) {
    // Die if the connection was not successful
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

echo "Connection was successful";
?>