<?php require_once("Include/DB.php");//include db file : because of connectivity?> 
<?php require_once("Include/session.php");?>
<?php require_once("Include/functions.php");?>
<?php require_once("Include/CmsUtil.php");?>
<?php Confirm_Login(); ?>
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
  $Confirmpassword=$_POST['ConfirmPassword'];
	  $author=$_SESSION['Username'];
    //validation start from here
    if(empty($Username)||empty($Password)||empty($Confirmpassword))
    {
    	$_SESSION['Errormassage'] ="All fields must be filled out";  //display the results
    	redirect_to("Admin.php");
    }
    elseif(strlen($Password)<4)
    {
    	$_SESSION['Errormassage']="Atleast 4 characters are reqiured for password.";
    	redirect_to("Admin.php");
    }
    elseif ($Password!==$Confirmpassword)
    {
      $_SESSION['Errormassage']="password/confirm password does not match.";
      redirect_to("Admin.php");
    }
    else
    {
			$DateTime = getCurrentDateTime();
			$Query="INSERT INTO registration(_dateTime,_userName,_Password,_AddedBy) VALUES('$DateTime','$Username','$Password','$author')";
    	if(executeQuery($Query))
    	{
    		$_SESSION['SuccessMessage']="Admin added sucessfully";
        	redirect_to("Admin.php");
        }
        else
        {
        	$_SESSION['Errormassage']="$Admin not added";
    		redirect_to("Admin.php");
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
.fieldInfo
{
  color:#f4611e;
  font-family:Bitter,Georgia,'Times New Roman',Times,serif;
  font-size: 1.2em;
}
</style>

	</head>
	<body>
    
      <?php include "Include/dashboardNavbarmenu.php"; ?>


<div class="container-fluid" style="margin-top: -21px;">
<!--div class="alert alert-success" role="alert" style="width:50%;margin-left: 20px;">
  <strong>Welcome to admin page!</strong>.
</div-->
	<div class="row">

		 <div class="col-sm-2">

     <?php

    $author=$_SESSION['Username'];
     ?>
       <h1 class="text-info"><?php echo $author; ?></h1>
        <ul id="Side_Menu" class="nav nav-pills nav-stacked">
        <li><a href=Dashboard.php>
        <span class="glyphicon glyphicon-th"></span>Dashboard</a></li>

        <li><a href="addNewPost.php">
        <span class="glyphicon glyphicon-list-alt"></span>Add New Post</a></li>

        <li><a href="Categories.php">
        <span class="glyphicon glyphicon-tags"></span>  Categories</a></li>
        <li><a href="EditPost.php">
        <span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
        <li class="active"><a href="Admin.php">
        <span class="glyphicon glyphicon-user"></span> Manage Admin</a></li>
        <li><a href="Comments.php">
        <span class="glyphicon glyphicon-comment"></span> Comments</a></li>
        <li><a href="blog.php">
        <span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
        <li><a href="logout.php">
        <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
		 </div><!--Ending of Side area-->

<div class=col-sm-10 style="background-color: #F8F8F8;">

      <h1 class="text-primary">Manage Admin Access</h1>
                <div><?php echo dangermassage();?>
                	<?php echo successmessage();?>
                </div>

     <div> <!--form div-->
              <form action="Admin.php" method="post">
              	<fieldset>
              	<div class="form-group">
              		<label for="categoryname"><span class="fieldInfo">User Name:</span></label>
              		<input class="form-control" type="text" name="UserName" id="UserName" placeholder="User Name"/>
                </div>
                <div class="form-group">
                  <label for="categoryname"><span class="fieldInfo">Password:</span></label>
                  <input class="form-control" type="text" name="Password" id="Password" placeholder="Password"/>
                </div>
                <div class="form-group">
                  <label for="categoryname"><span class="fieldInfo">Confirm Password:</span></label>
                  <input class="form-control" type="text" name="ConfirmPassword" id="ConfirmPassword" placeholder="Rewrite same password"/>
                </div>
                <br>
                <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Registration">
              	</fieldset>
              	<br>
               </form>

               <!--class="btn btn-default"(default color),class="btn btn-primary(dark blue),class="btn btn-info(light blue),bootstrap of class="btn btn-success (button color will change with green),class="btn btn-danger(red color)-->

               <!--class="btn-lg" to make it larger, class="btn-sm" to make it smaller, class="btn-block" to have quit large button -->
     </div> <!--end form div-->

<div class="table-responsive"> <!--class="table-responsive"-->
     <table class="table table-striped table-hover table-condensed"> <!--class="table table-striped table-hover"-->
     	<tr>
     		<th>Sr NO.</th>
        <th>Date and Time</th>
     		<th>Admin Name</th>
     		<th>Added By</th>
        <th>Action</th>
     	</tr>



     <?php
 $viewQuery="SELECT * FROM registration ORDER BY _dateTime desc"; // display the list of table
 $Execute=executeQuery($viewQuery); // running the query for view the data on the browser (category page)
 $Srno=0;
//Fetch a result row as a numeric array and as an associative array
 while ($DataRow=fetchArrayByExecutingQuery($Execute))// exract all data in the form of fetch array
 {
        $Id=$DataRow['_id'];
        $DateTime=$DataRow['_dateTime'];
        $username=$DataRow['_userName'];
        $Addedby=$DataRow['_AddedBy'];
        $Srno++;

?>

    <tr>
    	<td><?php echo $Srno;?></td>
    	s<td><?php echo $DateTime;?></td>
      <td><?php echo $username;?></td>
    	<td><?php echo $Addedby;?></td>
      <td><a href="DeleteAdmin.php?id=<?php echo $Id; ?>">
    <span class="btn btn-danger">Delete</a></span>
      </td>
    </tr>

<?php } ?>

    </table>
</div>


 </div><!--Ending of Main area-->


</div><!--Ending of Row area-->


</div><!--Ending of Container area-->
<footer style="margin-top: -70px;" class="container-fluid bg-4 text-center">
  <p>Managed By | <a href="https://www.yourdigitalmate.com">www.yourdigitalmate.com</a> | <span style="color:#f4511e">&copy;2018-2019.</span> All right reserved.</p> 
</footer>
	</body>
</html>
