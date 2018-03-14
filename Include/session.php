<?php

//start session
session_start();

function dangermassage()
{
	if(isset($_SESSION['Errormassage'])) //set up session here
	{
		// create bootstrap class for error massage it will give background color red 
		$output="<div class=\"alert alert-danger\">"; 
		$output.=htmlentities($_SESSION['Errormassage']); // these html entities convert into character(or php)
		$output.="</div>"; //concatenate session bootstrap and close the div 
		$_SESSION['Errormassage']=null; //when First time browser will open then there will not have no value
		return $output;
	}
}
/* This function is for the success massage means fields are added into database sucessfully 
   this msg will display inside of green background comes through bootstrap class 
*/
function successmessage()
{
	if(isset($_SESSION['SuccessMessage'])) 
	{
		$outputSuccess="<div class=\"alert alert-success\">";
		$outputSuccess.=htmlentities($_SESSION['SuccessMessage']);
		$outputSuccess.="</div>";
		$_SESSION['SuccessMessage']=null;
        return $outputSuccess;
    }

}

?>
