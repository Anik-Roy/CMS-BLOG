<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<!DOCTYPE>

<html>
	<head>
		<title>Blog Page</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-3.2.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/publicstyles.css">
               <style>
		

nav ul li{
    float: left;
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
		<?php
		global $ConnectingDB;
		// Query when Search Button is Active
		if(isset($_GET["SearchButton"])){
			$Search=$_GET["Search"];
			
		$ViewQuery="SELECT * FROM admin_panel
		WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%'
		OR category LIKE '%$Search%' OR post LIKE '%$Search%' ORDER BY id desc";
		}
		// QUery When Category is active URL Tab
		elseif(isset($_GET["Category"])){
		$Category=$_GET["Category"];
	$ViewQuery="SELECT * FROM admin_panel WHERE category='$Category' ORDER BY id desc";	
		}
		// Query When Pagination is Active i.e Blog.php?Page=1
		elseif(isset($_GET["Page"])){
		$Page=$_GET["Page"];
		if($Page==0||$Page<1){
			$ShowPostFrom=0;
		}else{
		$ShowPostFrom=($Page*3)-3;}
	$ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom,3";
		}
		// The Default Query for Blog.php Page
		else{
			
		$ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,3";}
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
		<?php echo htmlentities($DateTime);?>
<?php
$ConnectingDB;
$QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' AND status='ON'";
$ExecuteApproved=mysql_query($QueryApproved);
$RowsApproved=mysql_fetch_array($ExecuteApproved);
$TotalApproved=array_shift($RowsApproved);
if($TotalApproved>0){
?>
<span class="badge pull-right">
Comments: <?php echo $TotalApproved;?>
</span>
		
<?php } ?>
		
		</p>
		<p class="post"><?php
		if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
		
		echo $Post; ?></p>
		</div>
		<a href="FullPost.php?id=<?php echo $PostId; ?>"><span class="btn btn-info">
			Read More &rsaquo;&rsaquo;
		</span></a>
			
		</div>
		<?php } ?>
		<nav>
			<ul class="pagination pull-left pagination-lg">
	<!-- Creating backward Button -->
	<?php
	if(isset($Page))
	{
	       if($Page>1){
		?>
		<li><a href="Blog.php?Page=<?php echo $Page-1; ?>"> &laquo; </a></li>
         <?php        }
	} ?>			
		<?php
		global $ConnectingDB;
		$QueryPagination="SELECT COUNT(*) FROM admin_panel";
		$ExecutePagination=mysql_query($QueryPagination);
		$RowPagination=mysql_fetch_array($ExecutePagination);
		  $TotalPosts=array_shift($RowPagination);
		 // echo $TotalPosts;
		  $PostPagination=$TotalPosts/3;
		  $PostPagination=ceil($PostPagination);
		 // echo $PostPerPage;
		
		for($i=1;$i<=$PostPagination;$i++){
	if(isset($Page)){
		if($i==$Page){
		?>
		<li class="active"><a href="Blog.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php
		}else{ ?>
		<li><a href="Blog.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>	
		<?php
		}
	}
		} ?>
		<!-- Creating Forward Button -->
		<?php
	if(isset($Page))
	{
	       if($Page+1<=$PostPagination){
		?>
		<li><a href="Blog.php?Page=<?php echo $Page+1; ?>"> &raquo; </a></li>
         <?php        }
	} ?>	
		</ul>
		</nav>
		
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