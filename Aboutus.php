<?php //include db file : because of connectivity
require_once("Include/DB.php");?>
<?php require_once("Include/session.php");?>
<?php require_once("Include/functions.php");?>
<?php require_once("Include/CmsUtil.php");?>
<html>
	<head>
		<title>Blog Page</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-2.0.3.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="css/publicstyles.css">
                <style>
     
 .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  
  

  </style>
</head>
<body id="myPage">
<?php include "include/header.php"; ?>
<!--cantainer fluid start from here (website inside between top and footer)-->
<div class="container">
  <div class="blog-header">
  	<br><br>
    <h1> Professional and Affordable Websites <h1>
      
      </div>
 <div class="rows" style="margin-top: 20px;"> <!--rows div strat from here-->
 
  <div class="col-sm-8"> <!--main blog area div start from here-->
  	<div>
      <span class="glyphicon glyphicon-globe logo"></span>
    </div>

<p class="lead">We Believe in Innovation and quality, Your digital mate has started with a goal to help others to grow their business by increasing their presence in digital space. We also host & maintain new and existing websites. We do believe in delivering the best quality in given time frame with set budget. We believe in delivering excellent services built upon an open dialogue with our clients. We are a highly skilled and energetic Australia based web development team.

Your digital mate is a Sydney start up which has has grown from modest beginnings to become a leader in the fields of web application and software development. We are one of the fastest growing Web development and web design company. We also offer Automation testing services.</p>
  


 </div> <!--ending of main blog area here-->
  
<div class="col-sm-offset-1 col-sm-3"> <!--starting side bar from here-->
    <!--h2>About</h2>
    <img class="img-responsive img-circle imageicon" src="images/shanaya2.jpg"><br>
    <p>Your digital mate is a team of professionals, experienced in creating Responsive Websites, E-Commerce stores, Search engine optimisation (SEO) and Quality Assurance services (Automation). We Believe</p-->
    <div class="panel">
      <div class="panel-heading"><h2 class="panel-title">Categories<h2></div>
      <div class="panel-body">dummy Content</div>
      <div class="panel-footer"></div>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading"><h2 class="panel-title">Recent Post<h2></div>
      <div class="panel-body">dummy Content</div>
      <div class="panel-footer"></div>
    </div>

    <div>
      <span class="glyphicon glyphicon-signal logo"></span>
    </div><br>
    

</div> <!--ending of sidebar div here-->
   

 </div> <!--ending of rows class here-->
</div> <!--ending of container-fluid here-->
<div class="container-fluid" style="background-color:#F44336;color:#fff;height:200px;">
  <h1></h1>
  <h3></h3>
  <p></p>
  <p></p>
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
    <li class="active"><a href="http://www.yourdigitalmate.com/business-websites/">www.yourdigitalmate.com</a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
  </ul>
</nav>


<!--footer is starting from here -->
<?php include "include/footer.php"; ?>

</div>

</body>
</html>


