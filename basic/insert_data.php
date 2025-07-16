<?php 
$server = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "dkp"; 

// Create connection
$conn = mysqli_connect($server, $username, $password, $database); 

// Check connection
if (!$conn) {     
    die("Sorry, we failed to connect: " . mysqli_connect_error()); 
} 

// SQL query to insert data
$sql = "INSERT INTO `test` (`Sino`, `name`, `roll`, `Dojoin`) VALUES (NULL, 'raj', 'bsdd', '2925-03-07 11:54:22.000000');";

// Execute query
$result = mysqli_query($conn, $sql);

if ($result) {     
    echo "The record was inserted successfully.<br>"; 
} else {     
    echo "The record was not inserted successfully because of this error --> " . mysqli_error($conn); 
} 

// Close connection
mysqli_close($conn);
?>
