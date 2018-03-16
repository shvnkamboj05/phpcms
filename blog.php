<?php //include db file : because of connectivity
require_once("Include/DB.php");?>
<?php require_once("Include/session.php");?>
<?php require_once("Include/functions.php");?>
<?php require_once("Include/CmsUtil.php");?>
<div class="jumbotron text-center">
  <h1>BLOG</h1> 
 <p class="lead">This is a demo blog website. The contents used in this blog site are just for demo purpose.</p> 
 <form class="form-inline">
    <div class="input-group">
       <input text="text" class="form-control" size="50" placeholder="Search" name="search">
      <div class="input-group-btn">
      <button class="btn btn-primary" class="form-control" name="searchbutton">Search</button>
     </div>
      </div>
  </form>
  
</div>

<html>
	<head>
		<title>Blog Page</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-2.1.0.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="css/publicstyles.css">
                <style>
     
 
  
  #imgpanelAlign{
     margin-top: -10px;
     margin-left: 10px;
  }
  .margin_left{
    margin-left: 20px;
  }
  @media screen and (max-width: 768px) {
    .col-sm-3 {
      text-align: center;
      margin: 25px 0;
    }

  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php include "Include/header.php"; ?>
<!--cantainer fluid start from here (website inside between top and footer)-->
<div class="container">
  <div class="blog-header">
    <h1> The complete Responsive CMS Blog <h1>
      <p class="lead">The complete blog using PHP by yourdigitalmate</p>
     
    </div>
 <div class="rows" style="margin-top: 20px;"> <!--rows div strat from here-->
 
  <div class="col-sm-8"> <!--main blog area div start from here-->


  
<?php

if(isset($_GET["searchbutton"])){
  $search = $_GET["search"];
  $ViewQuery="SELECT * FROM admin_panal WHERE _dateTime LIKE '%$search%' OR _title LiKE '%$search%' OR _category LIKE '%$search%'  OR _post LIKE '%$search%' ";
}
else{
   //$PostIDFromURL = $_GET["id"];
   $ViewQuery="SELECT * FROM admin_panal ORDER BY _dateTime desc"; // display the list of table
}
 $Execute=executeQuery($ViewQuery); 
 $Srno=0;
 while ($DataRow = fetchArrayByExecutingQuery($Execute))// exract all data in the form of fetch array
 {
      $Postid = $DataRow['_id'];
      $Datetime = $DataRow['_dateTime'];
      $Title = $DataRow['_title'];
      $Category = $DataRow['_category'];
      $Author= $DataRow['_author'];
      $Images = $DataRow['_assets'];
      $Post = $DataRow['_post'];
      $Srno++;
   ?>
    
    
    <div class="blogpost thumbnail">
      <img class="img-responsive img-rounded" src="Upload/<?php echo $Images;?>">
    
    <div class="caption">

      <h1 id="heading"><?php echo htmlentities($Title)?></h1>
      <p class="description">Category: <?php echo htmlentities($Category);?> Puplished on <?php echo htmlentities($Datetime);?></p>
      <p class="post"><?php if(strlen($Post)>50){
        $Post=substr($Post,0,50).'...';}
       echo $Post; ?></p>
    </div>

    <a href="FullPost.php?id=<?php echo $Postid ?>"><span class="btn btn-info">Read More &rsaquo;&rsaquo;</span></a>
   </div>

   <?php } ?>

 </div> <!--ending of main blog area here-->
  
<div class="col-sm-offset-1 col-sm-3"> <!--starting side bar from here-->
    <!--h2>About</h2>
    <img class="img-responsive img-circle imageicon" src="images/shanaya2.jpg"><br>
    <p>Your digital mate is a team of professionals, experienced in creating Responsive Websites, E-Commerce stores, Search engine optimisation (SEO) and Quality Assurance services (Automation). We Believe</p-->
    <div class="panel">
      <div class="panel-heading"><h2 class="panel-title">Categories<h2></div>
      <div class="panel-body background">
        <?php
        $ViewQuery="SELECT * FROM category ORDER BY _dateTime desc";
         
         $Execute=executeQuery($ViewQuery); 

 while ($DataRow = fetchArrayByExecutingQuery($Execute))// exract all data in the form of fetch array
 {
      $id = $DataRow['id'];
      $Category = $DataRow['_name'];
    ?> 
    <a href="blog.php?category=<?php $Category; ?>"
     <span id="heading"><?php echo $Category."<br>" ?></span>
   </a>
     <?php } ?>
    </div>
      <div class="panel-footer"></div>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading"><h2 class="panel-title">Recent Post<h2></div>
      <div class="panel-body background">
        
<?php
                  
                   $ViewQuery="SELECT * FROM admin_panal ORDER BY _dateTime desc LIMIT 0,5";
                   $Execute=executeQuery($ViewQuery); 
                   
                 while ($DataRow = fetchArrayByExecutingQuery($Execute)) 
                         { 
                          $Id = $DataRow['_id'];
                          $Title = $DataRow['_title'];
                          $Datetime = $DataRow['_dateTime'];
                          $Images = $DataRow['_assets'];
                          if(strlen($Datetime)>11){$Date=substr($Datetime, 0,11);}
  ?>  
  <div>
  <img class="pull-left img-rounded" id="imgpanelAlign" src="Upload/<?php echo $Images;?>" width="70" height="70px";>
     <a href="FullPost.php?id=<?php echo $Id; ?>"
     <p id="heading" class="margin_left" > <?php echo  htmlentities($Title);?></p>
     </a>
     <p class="description" > <?php echo  htmlentities($Date);?></p>
      <hr>
  </div>
<?php }  ?>


      </div>
      <div class="panel-footer"></div>
    </div>

    <!--div>
      <span class="glyphicon glyphicon-signal logo"></span>
    </div><br>
    <div>
      <span class="glyphicon glyphicon-globe logo"></span>
    </div-->

</div> <!--ending of sidebar div here-->
   

 </div> <!--ending of rows class here-->
</div> <!--ending of container-fluid here-->

<!--footer is starting from here -->
<?php include "Include/footer.php"; ?>

</div>

</body>
</html>
