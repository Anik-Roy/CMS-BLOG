<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
$Name=mysql_real_escape_string($_POST["Name"]);
$Email=mysql_real_escape_string($_POST["Email"]);
$Comment=mysql_real_escape_string($_POST["Comment"]);
date_default_timezone_set("Asia/Karachi");
$CurrentTime=time();
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;
$PostId=$_GET["id"];

if(empty($Name)||empty($Email) ||empty($Comment)){
	$_SESSION["ErrorMessage"]="All Fields are required";
	
}elseif(strlen($Comment)>500){
	$_SESSION["ErrorMessage"]="only 500  Characters are Allowed in Comment";
	
}else{
	global $ConnectingDB;
	$PostIDFromURL=$_GET['id'];
        $Query="INSERT into comments (datetime,name,email,comment,approvedby,status,admin_panel_id)
	VALUES ('$DateTime','$Name','$Email','$Comment','Pending','OFF','$PostIDFromURL')";
	$Execute=mysql_query($Query);
	if($Execute){
	$_SESSION["SuccessMessage"]="Comment Submitted Successfully";
	Redirect_to("FullPost.php?id={$PostId}");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("FullPost.php?id={$PostId}");
		
	}
	
}	
	
}

?>
<!DOCTYPE>

<html>
	<head>
		<title>Full Blog Post</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-3.2.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/publicstyles.css">
               <style>
		

.FieldInfo{
    color: rgb(251, 174, 44);
    font-family: Bitter,Georgia,"Times New Roman",Times,serif;
    font-size: 1.2em;
}
.CommentBlock{
background-color:#F6F7F9;
}
.Comment-info{
	color: #365899;
	font-family: sans-serif;
	font-size: 1.1em;
	font-weight: bold;
	padding-top: 10px;
        
	
}
.comment{
    margin-top:-2px;
    padding-bottom: 10px;
    font-size: 1.1em
}


	       </style> 
	</head>
	<body>
<div style="height: 10px; background: #27aae1;"></div>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
		data-target="#collapse">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="Blog.php">
	   <img style="margin-top: -12px;" src="images/jazebakramcom.png" width=200;height=30;>
	</a>
		</div>
		<div class="collapse navbar-collapse" id="collapse">
		<ul class="nav navbar-nav">
			<li><a href="#">Home</a></li>
			<li class="active"><a href="Blog.php">Blog</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="#">Feature</a></li>
		</ul>
		<form action="Blog.php" class="navbar-form navbar-right">
		<div class="form-group">
		<input type="text" class="form-control" placeholder="Search" name="Search" >
		</div>
	         <button class="btn btn-default" name="SearchButton">Go</button>
			
		</form>
		</div>
		
	</div>
</nav>
<div class="Line" style="height: 10px; background: #27aae1;"></div>
<div class="container"> <!--Container-->
	<div class="blog-header">
	<h1>The Complete Responsive CMS Blog  </h1>
	<p class="lead">The Complete blog using PHP by Jazeb Akram</p>
	</div>
	<div class="row"> <!--Row-->
		<div class="col-sm-8"> <!--Main Blog Area-->
		<?php echo Message();
	      echo SuccessMessage();
	?>
		<?php
		global $ConnectingDB;
		if(isset($_GET["SearchButton"])){
			$Search=$_GET["Search"];
		$ViewQuery="SELECT * FROM admin_panel
		WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%'
		OR category LIKE '%$Search%' OR post LIKE '%$Search%'";
		}else{
			$PostIDFromURL=$_GET["id"];
		$ViewQuery="SELECT * FROM admin_panel WHERE id='$PostIDFromURL'
		ORDER BY datetime desc";}
		$Execute=mysql_query($ViewQuery);
		while($DataRows=mysql_fetch_array($Execute)){
			$PostId=$DataRows["id"];
			$DateTime=$DataRows["datetime"];
			$Title=$DataRows["title"];
			$Category=$DataRows["category"];
			$Admin=$DataRows["author"];
			$Image=$DataRows["image"];
			$Post=$DataRows["post"];
		
		?>
		<div class="blogpost thumbnail">
			<img class="img-responsive img-rounded"src="Upload/<?php echo $Image;  ?>" >
		<div class="caption">
			<h1 id="heading"> <?php echo htmlentities($Title); ?></h1>
		<p class="description">Category:<?php echo htmlentities($Category); ?> Published on
		<?php echo htmlentities($DateTime);?></p>
		<p class="post"><?php
		echo nl2br($Post); ?></p>
		</div>
			
		</div>
		<?php } ?>
		<br><br>
		<br><br>
		<span class="FieldInfo">Comments</span>
<?php
$ConnectingDB;
$PostIdForComments=$_GET["id"];
$ExtractingCommentsQuery="SELECT * FROM comments
WHERE admin_panel_id='$PostIdForComments' AND status='ON' ";
$Execute=mysql_query($ExtractingCommentsQuery);
while($DataRows=mysql_fetch_array($Execute)){
	$CommentDate=$DataRows["datetime"];
	$CommenterName=$DataRows["name"];
	$Comments=$DataRows["comment"];


?>
<div class="CommentBlock">
	<img style="margin-left: 10px; margin-top: 10px;" class="pull-left" src="images/comment.png" width=70px; height=70px;>
	<p style="margin-left: 90px;" class="Comment-info"><?php echo $CommenterName; ?></p>
	<p style="margin-left: 90px;"class="description"><?php echo $CommentDate; ?></p>
	<p style="margin-left: 90px;" class="Comment"><?php echo nl2br($Comments); ?></p>
	
</div>

	<hr>
<?php } ?>
		
		
		<br>
		<span class="FieldInfo">Share your thoughts about this post</span>
		
		
<div>
<form action="FullPost.php?id=<?php echo $PostId; ?>" method="post" enctype="multipart/form-data">
	<fieldset>
	<div class="form-group">
	<label for="Name"><span class="FieldInfo">Name</span></label>
	<input class="form-control" type="text" name="Name" id="Name" placeholder="Name">
	</div>
	<div class="form-group">
	<label for="Email"><span class="FieldInfo">Email</span></label>
	<input class="form-control" type="email" name="Email" id="Email" placeholder="email">
	</div>
	<div class="form-group">
	<label for="commentarea"><span class="FieldInfo">Comment</span></label>
	<textarea class="form-control" name="Comment" id="commentarea"></textarea>
	<br>
<input class="btn btn-primary" type="Submit" name="Submit" value="Submit">
	</fieldset>
	<br>
</form>
</div>

		</div> <!--Main Blog Area Ending-->
		<div class="col-sm-offset-1 col-sm-3"> <!--Side Area -->
		<h2>About me </h2>
	<img class=" img-responsive img-circle imageicon" src="images/Bunny.jpg">		
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
		, sed do eiusmod tempor incididunt ut labore et dolore magna
		aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul
		lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a
		ute irure dolor in reprehenderit in voluptate velit esse cill
		um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c
		upidatat non proi
		dent, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title">Categories</h2>
	</div>
	<div class="panel-body">
<?php
global $ConnectingDB;
$ViewQuery="SELECT * FROM category ORDER BY id desc";
$Execute=mysql_query($ViewQuery);
while($DataRows=mysql_fetch_array($Execute)){
	$Id=$DataRows['id'];
	$Category=$DataRows['name'];
?>
<a href="Blog.php?Category=<?php echo $Category; ?>">
<span id="heading"><?php echo $Category."<br>"; ?></span>
</a>
<?php } ?>
		
	</div>
	<div class="panel-footer">
		
		
	</div>
</div>




<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title">Recent Posts</h2>
	</div>
	<div class="panel-body background">
<?php
$ConnectingDB;
$ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5";
$Execute=mysql_query($ViewQuery);
while($DataRows=mysql_fetch_array($Execute)){
	$Id=$DataRows["id"];
	$Title=$DataRows["title"];
	$DateTime=$DataRows["datetime"];
	$Image=$DataRows["image"];
	if(strlen($DateTime)>11){$DateTime=substr($DateTime,0,12);}
	?>
<div>
<img class="pull-left" style="margin-top: 10px; margin-left: 0px;"  src="Upload/<?php echo htmlentities($Image); ?>" width=120; height=60;>
    <a href="FullPost.php?id=<?php echo $Id;?>">
     <p id="heading" style="margin-left: 130px; padding-top: 10px;"><?php echo htmlentities($Title); ?></p>
     </a>
     <p class="description" style="margin-left: 130px;"><?php echo htmlentities($DateTime);?></p>
	<hr>
</div>	
	
	
<?php } ?>		
		
	</div>
	<div class="panel-footer">
		
		
	</div>
</div>
		
		
		
		
		</div> <!--Side Area Ending-->
	</div> <!--Row Ending-->
	
	
</div><!--Container Ending-->
<div id="Footer">
<hr><p>Theme By | Jazeb Akram |&copy;2016-2020 --- All right reserved.
</p>
<a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;" href="http://jazebakram.com/coupons/" target="_blank">
<p>
This site is only used for Study purpose jazebakram.com have all the rights. no one is allow to distribute
copies other then <br>&trade; jazebakram.com &trade;  Udemy ; &trade; Skillshare ; &trade; StackSkills</p><hr>
</a>
	
</div>
<div style="height: 10px; background: #27AAE1;"></div> 






	    
	</body>
</html>