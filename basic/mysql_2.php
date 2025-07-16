<?php
echo "i ma rahul and connected to me data base"; 
echo "Welcome to our server<br>";

// Connecting to the database
$server = "localhost";
$username = "root";
$password = "";
$database="dkp";//this name table must exist in the php.myadmin;
 
// Create connection object
$conn = mysqli_connect($server, $username, $password,$database);


// Check connection
if (!$conn) {
    // Die if the connection was not successful
       die("Sorry, we failed to connect: " . mysqli_connect_error());
}

echo "Connection was successful";
//create a table in the data base;


?>