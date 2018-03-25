<?php require_once("Include/DB.php");//include db file : because of connectivity?> 
<?php require_once("Include/session.php");?>
<?php require_once("Include/functions.php");?>
<?php require_once("Include/CmsUtil.php");?>

<!DOCTYPE>
<?php
/*
Step 1: isset( $_POST['submit'] ) : This line checks if the form is submitted using the isset() function, but works only if the form input type submit has a name attribute (name="submit"). $_POST['NCategory']: The form data is stored in the $_POST['name as key'] variable array by PHP since it is submitted through the POST method, and the element name attribute value - name (name="fNCategory") is used to access its form field data.The form data is then assigned to a variable that was used to display the results.
Step 2: validation if $Categories(name filed) is empty then return error massage(session.php) and then redirect to(redirect funtions in functions.php) same page
Step 3: else validation $Categories(name field(varchar is 100) which is stored in phpCMS database under 'Category' table) count the string lenght(change the string lenght into number use the inbulid function (strlen) if lenght is greater then 99 then display error message and then redirect to same page
if name filed is true the enter the connectivity phase
Step 4: else declare connection variable as a global and then call the INSERT query and store the $query variable
Step 5: execute the insert query variable and connectivity variable with the mysqli_connect function
Step 6: check the  Connection Execution if connection is true the return success msg(session.php) otherwise error msg(session.php)
Step 7: close the Connection
*/

// Check if the form is submitted

if(isset($_POST["Submit"]))
{
	// retrieve the form data by using the element's name attributes value as key $Categories=$_POST['Category'];
	$Username=$_POST['UserName'];
  $Password=$_POST['Password'];

    if(empty($Username)||empty($Password))
    {
    	$_SESSION['Errormassage'] ="All fields must be filled out";  //display the results
    	redirect_to("Login.php");
    }
   else
    {
      $Found_Account=loginAttempt($Username,$Password);
     $_SESSION['user_id'] =$Found_Account["_id"];
      $_SESSION['Username'] =$Found_Account["_userName"];
			if($Found_Account)
      {
        $_SESSION['SuccessMessage']="Welcome {$_SESSION['Username']} ";  //display the results
      redirect_to("dashboard.php");

      }else{
        $_SESSION['Errormassage'] ="Invalid Username/password!";  //display the results
      redirect_to("Login.php");
      }
    }
}
?>
<html>
	<head>
		<title>Welcome Dashboard</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-2.0.3.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="css/adminstyles.css">
 <style>
body{
  background-color: #ffffff;
}
</style>

	</head>
	<body>
    <?php include "include/dashboardNavbarmenu.php"; ?>
<br><br><br>
<div class="container-fluid">

	<div class="row">

		 <!--div class="col-sm-2">
     
		 </div-->

<div class="col-sm-offset-4 col-sm-4">

      <h2>Welcome Back !</h2>
      <br>
                <div><?php echo dangermassage();?>
                	<?php echo successmessage();?>
                </div>

     <div> <!--form div-->
              <form action="Login.php" method="post">
              	<fieldset>
              	<div class="form-group">
                  <label for="categoryname"><span class="fieldInfo">User Name:</span></label>
                  <div class="input-group input-group-lg">
                     <span class="input-group-addon">
                       <span class="glyphicon glyphicon-envelope text-primary"></span>
                     </span>
              		<input class="form-control" type="text" name="UserName" id="UserName" placeholder="User Name"/>
                </div>
              </div>
                <div class="form-group">
                  <label for="categoryname"><span class="fieldInfo">Password:</span></label>
                  <div class="input-group input-group-lg">
                     <span class="input-group-addon">
                       <span class="glyphicon glyphicon-lock text-primary"></span>
                     </span>
                  <input class="form-control" type="password" name="Password" id="Password" placeholder="Password"/>
                </div>
                <div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
               </div>
              </div>
                <br>
                <input class="btn btn-info btn-lg" type="Submit" name="Submit" value="Login">
              	</fieldset>
              	<br>
               </form>

               <!--class="btn btn-default"(default color),class="btn btn-primary(dark blue),class="btn btn-info(light blue),bootstrap of class="btn btn-success (button color will change with green),class="btn btn-danger(red color)-->

               <!--class="btn-lg" to make it larger, class="btn-sm" to make it smaller, class="btn-block" to have quit large button -->
     </div> <!--end form div-->



 </div><!--Ending of Main area-->


</div><!--Ending of Row area-->


</div><!--Ending of Container area-->

<footer style="margin-top: 20px;" class="container-fluid bg-4 text-center">
  <p>Managed By | <a href="https://www.yourdigitalmate.com">www.yourdigitalmate.com</a> | <span style="color:#f4511e">&copy;2018-2019.</span> All right reserved.</p> 
</footer>
	</body>
</html>
