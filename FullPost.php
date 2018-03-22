  <?php //include db file : because of connectivity
  require_once("Include/DB.php");?>
  <?php require_once("Include/session.php");?>
  <?php require_once("Include/functions.php");?>
  <?php require_once("Include/CmsUtil.php");?>

  <?php if(isset($_POST["Submit"]))
  {
    // retrieve the form data by using the element's name attributes value as key $Categories=$_POST['Category'];
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Comments=$_POST['Comments'];

    $FullpostId=$_GET['id'];

      //validation start from here
      if(empty($Name)||empty($Email)||empty($Comments))
      {
        $_SESSION['Errormassage'] ="All fields are required";  //display the result
      }
      elseif (strlen($Comments)>500)
      {
        $_SESSION['Errormassage']="Only 500 characters are allowed in comments";
      }
      else
      {
        $DateTime = getCurrentDateTime();
        $fullpostIDfromURl=$_GET['id'];
        $Query="INSERT into comments(_dateTime,_Name,_Email,_Comments,_Status,admin_panel_id) VALUES('$DateTime','$Name','$Email','$Comments','OFF','$fullpostIDfromURl')";
        $execute = executeQuery($Query);
        if($execute)
        {
          $_SESSION['SuccessMessage']="Comment submitted sucessfully";
            redirect_to("FullPost.php?id={$FullpostId}");
          }
          else
          {
            $_SESSION['Errormassage']="Something went wrong. try again!";
            redirect_to("FullPost.php?id={$FullpostId}");
        }

      }
  }
  ?>
  <!DOCTYPE>
  <html>
  	<head>
  		<title>Full blog post</title>
                  <link rel="stylesheet" href="css/bootstrap.min.css">
                  <script src="js/jquery-2.1.0.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
                  <link rel="stylesheet" href="css/publicstyles.css">
    <style>
  .fieldInfo
  {
    color:#f4611e;
    font-family:Bitter,Georgia,'Times New Roman',Times,serif;
    font-size: 1.2em;
  }
  .CommentBlock{
    background-color: #F6F7F9;
  }
  .Comment-info{
    color: #365899;
    font-family: sans-serif;
    font-size: 1.1em;
    font-weight: bold;
    padding-top: 10px;
    margin-left: 90px;
  }
  #img-class{
    margin-left:10px; 
    margin-left:10px;
  }
  .Comment{
    margin-top: -2px;
    padding-bottom: 10px;
    font-size:1.1em;
    margin-left: 90px;
  }
  
  #shareurComments{
    font-family:Bitter,Georgia,'Times New Roman',Times,serif;
    font-size: 1.2em;
  }
  #imgpanelAlign{
     margin-top: -10px;
     margin-left: 10px;
  }

  
  </style>
  </head>
  <body>
  <?php include "Include/header.php";?>
  <!--cantainer fluid start from here (website inside between top and footer)-->
  <div class="container" >
    <div class="blog-header">
      <h1> The complete Responsive CMS Blog <h1>
        <p class="lead">The complete blog using PHP by Shivani Kamboj</p>
      </div>
   <div class="rows" style="margin-top: 20px;"> <!--rows div strat from here-->
   
    <div class="col-sm-8" style=""> <!--main blog area div start from here-->

                 <div><?php echo dangermassage();?>.  <!--these are sessions functions that are in session.php file-->
                    <?php echo successmessage();?>
                  </div>
    
  <?php

  if(isset($_GET["searchbutton"])){
    $ViewQuery="SELECT * FROM admin_panal WHERE _dateTime LIKE '%$search%' OR _title LiKE '%$search%' OR _category LIKE '%$search%'  OR _post LIKE '%$search%' ";
  }
  else{
    $PostIdFromUrl=$_GET["id"];
     $ViewQuery="SELECT * FROM admin_panal WHERE _id='$PostIdFromUrl' ORDER BY _dateTime desc"; // display the list of table
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
        <img class="img-responsive img-rounded" id="th_img_id_full" src="Upload/<?php echo $Images;?>">
      <div class="caption">

        <h1 id="heading"><?php echo htmlentities($Title)?></h1>
        <p class="description">Category: <?php echo htmlentities($Category);?> Puplished on <?php echo htmlentities($Datetime);?></p>
        <p class="post"><?php echo $Post; ?>
      </div>

     </div>

     <?php } ?><br>
     <span class="text-info" id="shareurComments">Share your comments here!</span>
     <br><br><br>
     <?php
     $GetFullpostIdforComments=$_GET['id'];
     $query="SELECT * FROM comments WHERE admin_panel_id='$GetFullpostIdforComments' AND _Status='ON' ";
     $execute=executeQuery($query);
     while($DataRow=fetchArrayByExecutingQuery($execute)){
            $Datetime=$DataRow['_dateTime'];
            $Name=$DataRow['_Name'];
            $Comments=$DataRow['_Comments'];
     
  ?>
    <div class="CommentBlock">
      <img id="img-class" class="pull-left" src="images/images.jpeg" width=70px; height=70px;>
        <p class="Comment-info"><?php echo $Name?></p>
        <p class="description"><?php echo $Datetime;?></p>
        <p class="Comment"><?php echo $Comments?></p>
    </div>
          <hr>

  <?php } ?>
  <div> <!--form div-->
                <form action="FullPost.php?id=<?php echo $_GET['id']; ?>" method="post"  enctype="multipart/form-data">
                  <fieldset>
                  <div class="form-group">
                  <label for="Name"><span class="fieldInfo">Name:</span></label>
                  <input class="form-control" type="text" name="Name" id="Name" placeholder="Name"/>
                  </div>
                  <div class="form-group">
                  <label for="Email"><span class="fieldInfo">Email:</span></label>
                  <input class="form-control" type="email" name="Email" id="Email" placeholder="Email"/>
                  </div>
                  <div class="form-group">
                    <label for="commentsarea"><span class="fieldInfo">Comment:</span></label>
                    <textarea class="form-control"  name="Comments" id="Comments" placeholder="comments here!">
                    </textarea>
                    <span class="help-block">Enter Comments into this block !</span>
                  </div>
                 <input class="btn btn-primary" type="Submit" name="Submit" value="Submit">
                   </div>
                  </fieldset>
                  <br>
                 </form>

                 <!--class="btn btn-default"(default color),class="btn btn-primary(dark blue),class="btn btn-info(light blue),bootstrap of class="btn btn-success (button color will change with green),class="btn btn-danger(red color)-->

                 <!--class="btn-lg" to make it larger, class="btn-sm" to make it smaller, class="btn-block" to have quit large button -->
       </div> <!--end form div-->

   

     
    </div> <!--ending of main blog area here-->
    
    <div class="col-sm-offset-1 col-sm-3"> <!--starting side bar from here-->
       <div class="panel">
        <div class="panel-heading"><h2 class="panel-title">Categories<h2></div>
        <div class="panel-body">
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
    <img class="pull-left img-rounded" id="imgpanelAlign" src="Upload/<?php echo $DataRow['_assets'];?>" width="70" height="70px";>
    <br>
       <a href="FullPost.php?id=<?php echo $DataRow['_id']; ?>"
       <p id="heading" style="margin-left: 20px;"> <?php echo  htmlentities($Title);?></p>
       </a>
       <p class="text-muted" style="float: right;margin-right: 49px;margin-top: -11px;"> <?php echo  htmlentities($Date);?></p>
        <br><hr>
    </div>
  <?php }  ?>


        </div>
        <div class="panel-footer"></div>
      </div>

    </div> <!--ending of sidebar div here-->
   </div> <!--ending of rows class here-->
  </div> <!--ending of container-fluid here-->
  <?php include "Include/footer.php";?>
  </body>
  	</html>
