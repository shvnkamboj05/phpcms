<?php require_once("Include/session.php");?>
<?php require_once("Include/functions.php");?>
<?php //include db file : because of connectivity
require_once("Include/DB.php");?>
<!-- *********Bootstrap classes***********
Bootstrap/css
	<div class="container-fluid"> //Use this container for a full width container, spanning the entire width of your viewport.
		-> Rows must be placed within a Container for proper alignment and padding.
         <div class="row" > //Use rows to create horizontal groups of columns.
         	->Content should be placed within columns, and only columns may be immediate children of rows.
               <div class="col-sm-2"> //sm- Small devices Tablets 
               	 work as a side menu
               </div> //closing coloumn small 2
               <div class="col-sm-10">
               	   work as main area 
               	</div> //closing coloumn small 10
         </div> // closing row div here
    </div> //closing container div
*********bootstrap/components**********
 class="nav nav-pills nav-stacked"      
 Navigation .nav is the base class reqiures for the .nav-tab or .nav-pills or .nav-stacked
 class ="nav nav-tab" -> it the will display menu as in tab Form
 class ="nav nav-pills"-> replace of tab we can take pills ....Pills are also vertically stackable.
 but need to add futher nav-stacked after it as like "nav-pills nav-stacked" 
 Easily make tabs or pills equal widths of their parent at screens wider than 768px with .nav-justified. 
 On smaller screens, the nav links are stacked.
 -->
<!DOCTYPE>
<html>
	<head>
		<title>Welcome Dashboard</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-2.0.3.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="css/adminstyles.css">
                <style>
                .person-info{
                  color:#5e5eff;
                }
              </style>
                
	</head>
	<body>
		<div style="height:10px; background:#27AAE1;"></div> <!--top blue line -->
<nav class="navbar navbar-inverse" role="navigation"><!-- starting main navbar-->
 <div class="container"> <!-- start container from here-->
  <div class="navbar-header"> <!-- start navbar header div from here-->
    <!--toggle menu start from here-->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse"> 
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button> <!--ending of toggle menu here-->
    <!--image or place ur website logo here-->
    <a class="navbar-brand" href="blog.php">
    <img src="images/dolicharity.jpg" style="width:200;height:30;">
   </a>
   <!--ending of website logo -->
  </div> <!-- ending of navbar header div from here-->
  <!--id=collapse is id which is using above inside into toggle class of bootstrap-->
   <div class="collapse navbar-collapse" id="collapse"> 
    <!--enclose the menu item which we want to be collapsed inside this toggle menu-->
    <!--top menu start from here-->
    <ul class="nav navbar-nav"> 
     <li><a href="#">Home</a></li>
     <li class="active"><a href="blog.php" target="_blank">Blog</a></li>
     <li><a href="#">About</a></li>
     <li><a href="#">Services</a></li>
     <li><a href="#">Contact us</a></li>
      <li><a href="#">Features</a></li>
    </ul>
    <form method="" action="blog.php" class="navbar-form navbar-right">
      <div class="form-control">
      <input text="text" class="form-control" placeholder="Search" name="search">
     </div>
     <button text="btn btn-success" name="searchbutton">Go</button>
    </form>
  <!--closing of menu from here-->
   </div> <!--closing of collapse navbar-collapse class of bootstrap-->
 </div> <!-- ending of Container here-->
</nav><!-- ending of main navbar here-->

<div class="Line" style="height:10px; background:#27AAE1;"></div> <!--after the menu blue line -->


<div class="container-fluid">
	
	<div class="row">

		 <div class="col-sm-2">

		 	<h1>Shivani</h1>
        <ul id="Side_Menu" class="nav nav-pills nav-stacked">
        <li><a href=Dashboard.php>
        <span class="glyphicon glyphicon-th"></span>Dashboard</a></li>

        <li><a href="addNewPost.php">
        <span class="glyphicon glyphicon-list-alt"></span> Add New Post></a></li>

        <li><a href="Categories.php">
        <span class="glyphicon glyphicon-tags"></span>  Categories</a></li>
        <li><a href="EditPost.php">
        <span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
        <li><a href=#>
        <span class="glyphicon glyphicon-user"></span> Manage Admin</a></li>
        <li class="active"><a href="Comments.php">
        <span class="glyphicon glyphicon-comment"></span> Comments</a></li>
        <li><a href=#>
        <span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
        <li><a href=#>
        <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
		 </div><!--Ending of Side area-->

		 	<div class=col-sm-10> <!--main area-->
		 		<!--sucessfully added name filed which in category.php file into database (table category) and will display on this
		 			page through sucessmessage -->
               <div><?php echo successmessage();?>
                  </div>
		 		<h1>Un-Approved Comments</h1>
		 		<div class="table-responsive">
          <table class="table table-striped table-hover table-condensed">
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Date</th>
              <th>Comment</th>
              <th>Approve</th>
              <th>Delete Comment</th>
              <th>Details</th>
             </tr>
      <?php
                  
                   $ViewQuery="SELECT * FROM comments WHERE _Status='OFF' ORDER BY _dateTime desc ";
                   $Execute=executeQuery($ViewQuery); 
                   $Srno=0;
                 while ($DataRow = fetchArrayByExecutingQuery($Execute)) 
                         { 
                          $CommentId= $DataRow['_id'];
                          $PersonName = $DataRow['_Name'];
                          $DatetimeofComments = $DataRow['_dateTime'];
                          $PersonComment = $DataRow['_Comments'];
                          $CommentedPostId = $DataRow['admin_panel_id'];
                          $Srno++;
                      if(strlen($PersonName)>3){ $PN=substr($PersonName,0,3).".."; }
                      if(strlen($DatetimeofComments)>3){$DTc=substr($DatetimeofComments, 0,3)."..";}
                      if(strlen($PersonComment)>18){$PC=substr($PersonComment, 0,18);}
             ?>     
         
        <tr>
      <td class="person-info"><?php echo htmlentities($Srno);?></td>
      <td class="person-info"><?php echo htmlentities($PN);?></td>
      <td class="person-info"><?php echo htmlentities($DTc);?></td>
      <td class="person-info"><?php  echo htmlentities($PC);?></td>
      <td><a href="ApproveComments.php?id=<?php echo $CommentId; ?>"><span class="btn btn-success">Approve</span></a></td>
      <td><a href="DeleteComments.php?id=<?php echo $CommentId;?>"><span class="btn btn-danger">Delete</span></a></td>
      <td><a href="FullPost.php?id=<?php echo $CommentedPostId; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
      
        </tr>
<?php } ?>
          </table>
 
        </div>
        <h1>Approved Comments</h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-condensed">
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Date</th>
              <th>Comment</th>
              <th>Approved by</th>
              <th>Revert Approve</th>
              <th>Delete Comment</th>
              <th>Details</th>
             </tr>
      <?php
                  
                   $ViewQuery="SELECT * FROM comments WHERE _Status='ON' ORDER BY _dateTime desc";
                   $Execute=executeQuery($ViewQuery); 
                   $Admin="shivani";
                   $Srno=0;
                 while ($DataRow = fetchArrayByExecutingQuery($Execute)) 
                         { 
                          $CommentId= $DataRow['_id'];
                          $PersonName = $DataRow['_Name'];
                          $DatetimeofComments = $DataRow['_dateTime'];
                          $PersonComment = $DataRow['_Comments'];
                          $CommentedPostId = $DataRow['admin_panel_id'];
                          $Srno++;
                          if(strlen($PersonName)>3){ $PN=substr($PersonName,0,3).".."; }
                          if(strlen($DatetimeofComments)>3){$DTc=substr($DatetimeofComments, 0,3)."..";}
                          if(strlen($PersonComment)>18){$PC=substr($PersonComment, 0,18);}
             ?>     
         
    <tr>
    
      <td class="person-info"><?php echo htmlentities($Srno);?></td>
      <td class="person-info"><?php echo htmlentities($PN);?></td>
      <td class="person-info"><?php echo htmlentities($DTc);?></td>

      <td class="person-info"><?php  echo htmlentities($PC);?></td>
      <td class="person-info"><?php echo $Admin;?></td>
      <td><a href="DisApproveComments.php?id=<?php echo $CommentId; ?>"><span class="btn btn-warning">Dis-Approve</span></a></td>
      <td><a href="DeleteComments.php?id=<?php echo $CommentId;?>"><span class="btn btn-danger">Delete</span></a></td>
      <td><a href="FullPost.php?id=<?php echo $CommentedPostId; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
    </tr>
<?php } ?>
          </table>
 
        </div>
		 		
                 
		 	
		 	
		 </div><!--Ending of Main area-->
		

	</div><!--Ending of Row area-->


</div><!--Ending of Container area-->

<?php include "Include/footer.php"; ?>
	    
	</body>
</html>