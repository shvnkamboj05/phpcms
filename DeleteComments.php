<?php require_once("Include/session.php");?>
<?php require_once("Include/functions.php");?>
<?php //include db file : because of connectivity
require_once("Include/DB.php");?>

<?php
if(isset($_GET["id"]))
{
$GetIdfromURL =$_GET["id"];

$query="DELETE FROM comments WHERE _id='$GetIdfromURL' ";
$Execute=executeQuery($query);
if($Execute)
{
 $_SESSION['SuccessMessage']="Comment deleted successfully";
 redirect_to("Comments.php");
}else{
 $_SESSION['Errormassage']="something went wrong. Please try again!";
 redirect_to("Comments.php");

}

}
?>
