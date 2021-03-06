<?php //include db file : because of connectivity
require_once("Include/DB.php");?>
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
	$TitleN=$_POST['title'];
  $Category=$_POST['category'];
  $addPost=$_POST['post'];

	  $authorName="shivani";
    $Image=$_FILES["image"]["name"]; // $_FILES SuperGlobal file for the image
    $Target="Upload/".basename($_FILES["image"]["name"]);
    //validation start from here
    if(empty($TitleN))
    {
    	$_SESSION['Errormassage'] ="Title must be filled out for the post";  //display the results
    	redirect_to("dashboard.php");
    }
    elseif (strlen($TitleN)<2)
    {
    	$_SESSION['Errormassage']="Title should be atleast 2 character";
    	redirect_to("dashboard.php");
    }
    else
    {
			$DateTime = getCurrentDateTime();
      $EditFromUrl=$_GET['edit'];
    	$Query="UPDATE admin_panal SET _dateTime='$DateTime', _title='$TitleN', _category='$Category', _author='$authorName', _assets='$Image', _post='$addPost' WHERE _id='$EditFromUrl' ";
    	$execute = executeQuery($Query);
      if( !move_uploaded_file($_FILES["image"]["tmp_name"], $Target)){
        error_log("Unable to upload file...");
        $_SESSION['Errormassage']="Something went wrong. Unable to upload file...!";
        redirect_to("dashboard.php");
      }

    	if($execute)
    	{
    		$_SESSION['SuccessMessage']="Post updated sucessfully";
        	redirect_to("dashboard.php");
        }
        else
        {
        	$_SESSION['Errormassage']="Something went wrong. try again!";
    		  redirect_to("dashboard.php");
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
   <?php include "Include/dashboardNavbarmenu.php"; ?>
<div class="container-fluid" style="margin-top: -21px;">

	<div class="row">

		 <div class="col-sm-2">
   <?php $author=$_SESSION['Username'];?>
       <h1 class="text-info"><?php echo $author; ?></h1>
        <ul id="Side_Menu" class="nav nav-pills nav-stacked">
        <li><a href=Dashboard.php>
        <span class="glyphicon glyphicon-th"></span>Dashboard</a></li>

        <li><a href="addNewPost.php">
        <span class="glyphicon glyphicon-list-alt"></span>Add New Post</a></li>
       

        <li><a href="Categories.php">
        <span class="glyphicon glyphicon-tags"></span>  Categories</a></li>
        <li class="active"><a href="EditPost.php">
        <span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
        <li><a href="Admin.php">
        <span class="glyphicon glyphicon-user"></span> Manage Admin</a></li>
        <li><a href="Comments.php">
        <span class="glyphicon glyphicon-comment"></span> Comments</a></li>
        <li><a href="blog.php">
        <span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
        <li><a href="logout.php">
        <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
		 </div><!--Ending of Side area-->

<div class=col-sm-10>
 <div>
                
      <h1>Update Post</h1>
           <?php echo dangermassage();?>
            <?php echo successmessage();?>
                </div>
      <?php
      $SearchQueryParameter=$_GET['edit'];
     $ViewQuery="SELECT * FROM admin_panal WHERE _id='$SearchQueryParameter'";
       $Execute=executeQuery($ViewQuery); 
         while ($DataRow = fetchArrayByExecutingQuery($Execute))// exract all data in the form of fetch array
      {
        $TitleToBeUpdated=$DataRow['_title'];
        $CategoryToBeUpdated=$DataRow['_category'];
        $ImageToBeUpdated=$DataRow['_assets'];
        $PostToBeUpdated=$DataRow['_post'];
      }



      ?>
     <div> <!--form div-->
              <form action="EditPost.php?edit=<?php echo $SearchQueryParameter; ?>" method="post"  enctype="multipart/form-data">
              	<fieldset>
              	<div class="form-group">
              	<label for="title"><span class="fieldInfo">Title:</span></label>
              	<input value="<?php echo $TitleToBeUpdated ?>" class="form-control" type="text" name="title" id="title" placeholder="Title"/>
                </div>
                 <div class="form-group">
                  <span class="fieldInfo">Existing Category: </span>
                  <?php echo  $CategoryToBeUpdated; ?> <br>
                    <label for="categoryselect"><span class="fieldInfo">Category:</span></label>
                    <select class="form-control" name="category" id="categoryselect"/>
                  <?php
                 
                    $viewQuery="SELECT * FROM category ORDER BY _dateTime desc";
                    $Execute=executeQuery($viewQuery);
                    $Srno=0;
                    while($DataRow=fetchArrayByExecutingQuery($Execute))
                    {
                      $Id=$DataRow['id'];
                      $Name=$DataRow['_name'];
                      $Srno++;

                   ?>
                   <option><?php echo  $Name;?></option>

                    <?php } ?>
                  </select>

                </div>
                <div class="form-group">
                  <span class="fieldInfo">Existing Image: </span>
                  <img src="upload/<?php echo $ImageToBeUpdated; ?>" weight="170" height="80px"> <br>
                  <label for="imageselect"><span class="fieldInfo">Select Images:</span></label>
                  <input class="form-control" type="File"  name="image" id="imageselect" />
                </div>
                <div class="form-group">
                  <label for="postarea"><span class="fieldInfo">Post:</span></label>
                  <textarea class="form-control"  name="post" id="postarea" placeholder="place your post here!">
                    <?php echo  $PostToBeUpdated ?> 
                  </textarea>
                  <span class="help-block">Enter you blog into this block !</span>
                </div>
                </div>
                <br>
                <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Update Post">
              	</fieldset>
              	<br>
               </form>

               <!--class="btn btn-default"(default color),class="btn btn-primary(dark blue),class="btn btn-info(light blue),bootstrap of class="btn btn-success (button color will change with green),class="btn btn-danger(red color)-->

               <!--class="btn-lg" to make it larger, class="btn-sm" to make it smaller, class="btn-block" to have quit large button -->
     </div> <!--end form div-->



     <?php
 $viewQuery="SELECT * FROM category ORDER By _dateTime desc"; // display the list of table
 $Execute=executeQuery($viewQuery); // running the query for view the data on the browser (category page)
 $Srno=0;
//Fetch a result row as a numeric array and as an associative array
 while ($DataRow=mysqli_fetch_array($Execute))// exract all data in the form of fetch array
 {
        $Id=$DataRow['id'];
        $DateTime=$DataRow['_dateTime'];
        $Name=$DataRow['_name'];
        $CreatorName=$DataRow['_creatorName'];
        $Srno++;
}
?>


 </div><!--Ending of Main area-->


</div><!--Ending of Row area-->


</div><!--Ending of Container area-->

<footer style="margin-top: -70px;" class="container-fluid bg-4 text-center">
  <p>Managed By | <a href="https://www.yourdigitalmate.com">www.yourdigitalmate.com</a> | <span style="color:#f4511e">&copy;2018-2019.</span> All right reserved.</p> 
</footer>
	</body>
</html>
