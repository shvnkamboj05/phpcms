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
	$Categories=$_POST['Category'];
	  $author="shivani";
    //validation start from here
    if(empty($Categories))
    {
    	$_SESSION['Errormassage'] ="All fields must be filled out";  //display the results
    	redirect_to("Categories.php");
    }
    elseif (strlen($Categories)>99)
    {
    	$_SESSION['Errormassage']="too long name";
    	redirect_to("Categories.php");
    }
    else
    {
			$DateTime = getCurrentDateTime();
			$Query="INSERT INTO category (_dateTime,_name,_creatorName) VALUES('$DateTime','$Categories','$author')";
    	if(executeQuery($Query))
    	{
    		$_SESSION['SuccessMessage']="Categories added sucessfully";
        	redirect_to("Categories.php");
        }
        else
        {
        	$_SESSION['Errormassage']="$Categories not added";
    		redirect_to("Categories.php");
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
  color:rgb(251,174,44);
  font-family:Bitter,Georgia,'Times New Roman',Times,serif;
  font-size: 1.2em;
}
</style>

	</head>
	<body>

<div class="container-fluid">

	<div class="row">

		 <div class="col-sm-2">
     <h1>Shivani</h1>
        <ul id="Side_Menu" class="nav nav-pills nav-stacked">
        <li><a href=Dashboard.php>
        <span class="glyphicon glyphicon-th"></span>Dashboard</a></li>

        <li><a href="addNewPost.php">
        <span class="glyphicon glyphicon-list-alt"></span>Add New Post</a></li>

        <li class="active"><a href="Categories.php">
        <span class="glyphicon glyphicon-tags"></span>  Categories</a></li>
        <li><a href="EditPost.php">
        <span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
        <li><a href=#>
        <span class="glyphicon glyphicon-user"></span> Manage Admin</a></li>
        <li><a href="Comments.php">
        <span class="glyphicon glyphicon-comment"></span> Comments</a></li>
        <li><a href=#>
        <span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
        <li><a href=#>
        <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
		 </div><!--Ending of Side area-->

<div class=col-sm-10>

      <h1>Manage Categories</h1>
                <div><?php echo dangermassage();?>
                	<?php echo successmessage();?>
                </div>

     <div> <!--form div-->
              <form action="Categories.php" method="post">
              	<fieldset>
              	<div class="form-group">
              		<label for="categoryname"><span class="fieldInfo">Name:</span></label>
              		<input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name"/>
                </div>

                <br>
                <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
              	</fieldset>
              	<br>
               </form>

               <!--class="btn btn-default"(default color),class="btn btn-primary(dark blue),class="btn btn-info(light blue),bootstrap of class="btn btn-success (button color will change with green),class="btn btn-danger(red color)-->

               <!--class="btn-lg" to make it larger, class="btn-sm" to make it smaller, class="btn-block" to have quit large button -->
     </div> <!--end form div-->

<div class="table-responsive"> <!--class="table-responsive"-->
     <table class="table table-striped table-hover table-condensed"> <!--class="table table-striped table-hover"-->
     	<tr>
     		<th>Id</th>
     		<th>Name</th>
     		<th>Date and Time</th>
     		<th>Creator Name</th>
     	</tr>



     <?php
 $viewQuery="SELECT * FROM category ORDER BY _dateTime desc"; // display the list of table
 $Execute=executeQuery($viewQuery); // running the query for view the data on the browser (category page)
 $Srno=0;
//Fetch a result row as a numeric array and as an associative array
 while ($DataRow=fetchArrayByExecutingQuery($Execute))// exract all data in the form of fetch array
 {
        $Id=$DataRow['id'];
        $DateTime=$DataRow['_dateTime'];
        $Name=$DataRow['_name'];
        $CreatorName=$DataRow['_creatorName'];
        $Srno++;

?>

    <tr>
    	<th><?php echo $Srno;?></th>
    	<th><?php echo $Name;?></th>
    	<th><?php echo $DateTime;?></th>
    	<th><?php echo $CreatorName;?></th>
    </tr>

<?php } ?>

    </table>
</div>


 </div><!--Ending of Main area-->


</div><!--Ending of Row area-->


</div><!--Ending of Container area-->

<div id="footer">

	<hr><p>Theme By | Shivani Kamboj | &copy;2018-2019 ------ All right reserved.</p>

	<a style="color: white; text-decoration: none; cursor: pointer;font-weight: bold;" href="http://localhost/PHPCMS/dashboard.php">

	<p>This site purpose is to provide the information regarding Art Gallery and shivanikamboj.com have all the rights. no one can allow copyies other than <br> &trade; shivanikamboj.com &trade;  yourdigitalmate.com &trade; hello.com </p></a>
	<hr>

</div>
<div style="height: 10px; background: #27AAE1;"></div>

	</body>
</html>
