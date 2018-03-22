<?php
// this is for redirect the page 
function redirect_to($new_location){
	header("location:".$new_location); // header("location: filename.php" or "location:"$variablename)
    	exit();
}

function loginAttempt($username,$password)
{
   global $ConnectingDB;
   $Query="SELECT * FROM registration WHERE _userName='$username' AND _Password='$password' "; 
	$Execute = mysqli_query($ConnectingDB, $Query);  // execute the query
	if($admin=mysqli_fetch_assoc($Execute)) // assco : we are checking here this username and password are existing or not
	{
     return $admin;
    }else{
    	return null;
    }
}
?>