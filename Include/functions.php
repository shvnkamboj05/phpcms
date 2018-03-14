<?php
// this is for redirect the page 
function redirect_to($new_location){
	header("location:".$new_location); // header("location: filename.php" or "location:"$variablename)
    	exit();
}
?>