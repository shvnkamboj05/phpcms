<?php
/*
connection connectivity
step1: hostname, mysql username, mysql password
step2: create connection (mysqli_connect) hostname,username,password, databasename
step3: Connection check(optional)
*/
$servername = "localhost";
$username = "admin";
$password = "password";

// Create connection
$ConnectingDB = mysqli_connect($servername, $username, $password, 'phpCMS');
//$ConnectingDB = mysqli_select_db($conn, 'phpCMS');
// Check connection
if (!$ConnectingDB) {
    die("Connection failed: " . mysqli_connect_error());
}
function executeQuery($query)
{
	global $ConnectingDB;
	$execute = mysqli_query($ConnectingDB, $query);  // execute the query
	return $execute;
}

function fetchArrayByExecutingQuery($execute)
{
	$array = mysqli_fetch_array($execute);
	return $array;
}

function closeDBConnection()
{
	global $ConnectingDB;
	mysqli_close($ConnectingDB);
}

/*function executeQueryAndFetchArray($query)
{
	$value = executeQuery($query);
	$array = fetchArrayByExecutingQuery($value);
	return $array;
}
*/

?>