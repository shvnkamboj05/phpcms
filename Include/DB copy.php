<?php
$servername = "localhost";
$username = "admin";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
$ConnectingDB = mysqli_select_db($conn, 'phpCMS');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>



<!--?php
//$Connection=mysql_connect('localhost','root','');
//$ConnectingDB=mysql_select_db('phpCMS','$Connection');

$mysqli=new mysqli('localhost','admin','password','phpCMS');

if($mysqli->connect_error){
	echo $mysqli->connect_error;
}
?-->

<!--?php
$Connection=mysql_connect('localhost','root','');
$ConnectingDB=mysql_select_db('phpCMS','$Connection');

?-->



<!--?php
$servername = "localhost";
$username = "admin";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password, 'phpCMS');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?-->