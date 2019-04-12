<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>

<?php
  if(isset($_POST["Submit"])) {
    $name = mysqli_real_escape_string($connection, $_POST["Name"]);
    $email = mysqli_real_escape_string($connection, $_POST["Email"]);
    $comment = mysqli_real_escape_string($connection, $_POST["Comment"]);
    $IdFromUrl = $_GET['id'];

    date_default_timezone_set("Asia/Dhaka");
    $currentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    if(empty($name) || empty($email) || empty($comment)) {
      $_SESSION['ErrorMessage'] = "All fields are required";
    } else if(strlen($comment) > 5000) {
      $_SESSION['ErrorMessage'] = "Comment length should be between 500 characters";
    } else {
      global $connection;
      $query = "insert into comments(datetime, name, email, comment, approvedby, status, admin_panel_id)
                values('$DateTime', '$name', '$email', '$comment', 'pending...', 'OFF', '$IdFromUrl')";
      $execute = mysqli_query($connection, $query);

      if($execute) {
        $_SESSION['SuccessMessage'] = "Comment submitted successfully";
        Redirect_to("FullBlogPost.php?id={$IdFromUrl}");
      } else {
        $_SESSION['ErrorMessage'] = "Post cannot be added. Please check your internet connection...";
        Redirect_to("FullBlogPost.php?id={$IdFromUrl}");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/publicstyles.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
      .col-sm-8 {

      }

      .col-sm-3 {

      }

      .fieldInfo {
        color: #218838;
        font-size: 18px;
      }

      .commentHeader {
        border:1px dashed #ddd;
        text-align: center;
        font-weight: bold;
      }

      .allComments img {
        width: 50px;
        height: 50px;
        /* border-radius: 50%; */
        float: left;
        margin-right: 10px;
      }

      /* .commentName h4 {
        font-size: 15px;
        font-weight: bold;
        font-style: italic;
        float: left;
        margin-right: 5px;
      }

      .commentName p {
        font-size: 15px;
      } */

      .div-Blur {
        -webkit-filter: blur(1px);
        -moz-filter: blur(1px);
        -ms-filter: blur(1px);
        -o-filter: blur(1px);
        filter: blur(1px);
        cursor:not-allowed;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="images/logo.JPG" width="50" height="50" alt="" style="border-radius:50%">
        Tech Info
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
        </ul>
        <form action="blog.php" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" name="Search" placeholder="Search" aria-label="Search">
          <button style="color:#fff" class="btn btn-outline-success my-2 my-sm-0" type="submit" name="Submit">Search</button>
        </form>
      </div>
    </nav>
    <div style="height:10px; background:#27aae1;"></div>
    <div class="container"><!--contaner area-->
      <div class="blog-header">
        <h2>The complete responsive cms blog.</h2>
        <p class="lead">The comple CMS blog using PHP, MySQLI, Bootstrap by Anik Roy Gourab</p>
      </div>
      <div><?php echo Message(); echo SuccessMessage();?></div>
      <div class="row"><!--row area-->
        <div class="col-sm-8"><!--main blog area-->
          <?php

            if(isset($_GET['Submit'])) {
              $search = $_GET['Search'];
              $ViewQuery = "select * from admin_panel
                where datetime like '%$search%' or title like '%$search%' or category like '%$search%'
                or author like '%$search%' or post like '%$search%' order by id desc";
            } else {
              $PostIdFromUrl = $_GET['id'];
              global $connection;
              $ViewQuery = "select * from admin_panel where id='$PostIdFromUrl' order by id desc";
            }
            $execute = mysqli_query($connection, $ViewQuery);

            while($DataRows = mysqli_fetch_array($execute)) {
              $id = $DataRows["id"];
              $datetime = $DataRows["datetime"];
              $title = $DataRows["title"];
              $category = $DataRows["category"];
              $author = $DataRows["author"];
              $image = $DataRows["image"];
              $post = $DataRows["post"];
          ?>

          <div class="blogpost img-thumbnail">
            <?php $flag = false;?>
            <img src="upload/<?php echo $image?>" class="img-fluid mx-auto d-block" alt="Responsive image"/>
            <div class="caption">
              <h3 id="heading"><?php echo htmlentities($title); ?></h3>
              <p class="description">Category:<?php echo htmlentities($category); ?><span style="margin-left:5px; float:right;">Published on:
                <?php echo htmlentities($datetime);?></span>
              </p>
              <p class="post"><?php
               echo nl2br(htmlentities($post));?></p>
            </div>
          </div>

          <?php }?>

          <!--All Comments-->
          <div>
            <h3 class="fieldInfo">All Comments:</h3>
            <?php
              global $connection;
              $PostIdFromUrl = $_GET['id'];
              $getComments = "select * from comments where admin_panel_id={$PostIdFromUrl}";
              $execute = mysqli_query($connection, $getComments);

              while($DataRows = mysqli_fetch_array($execute)) {
                $commentId = $DataRows['id'];
                $commentDate = $DataRows['datetime'];
                $commentName = $DataRows['name'];
                $comment = $DataRows['comment'];
                $status = $DataRows['status'];
            ?>

            <?php if ($status=="OFF") {?>

              <div class="div-Blur">
                <div class="row">
                  <div class="col-sm-1 allComments">
                    <img src="images/user.jpg" alt="image" class="rounded-circle"/>
                  </div>

                  <div class="col-sm-11">
                    <div id=<?php echo $commentId;?> class="commentName">
                      <h4><?php echo $commentName;?></h4>
                      <p><?php echo $commentDate;?></p>
                    </div>

                    <p><?php echo nl2br($comment);?></p>
                  </div>
                </div>
              </div>
            <?php } else {?>
              <div>
                <div class="row" style="border-bottom:1px solid #ddd;">
                  <div class="col-sm-1 allComments">
                    <img src="images/user.jpg" alt="image" class="rounded-circle"/>
                  </div>

                  <div class="col-sm-11">
                    <div id=<?php echo $commentId;?> class="commentName">
                      <h4><?php echo $commentName;?></h4>
                      <p><?php echo $commentDate;?></p>
                    </div>

                    <p><?php echo nl2br($comment);?></p>
                  </div>
                </div>
              </div>
            <?php }?>

          <?php }?>
          </div>


          <!--Form div -->
          <br/><br/>
          <div class="commentHeader">
            <span class="fieldInfo">Share your thoughts about this post...</span>
            <br/>
            <span class="fieldInfo">Your comment:</span>
          </div>
          <div>
            <form action="FullBlogPost.php?id=<?php echo $PostIdFromUrl;?>" method="post">
              <fieldset>

                <div class="form-group">
                    <label for="name"><span class="fieldInfo">Name:</span></label>
                    <input class="form-control" type="text" name="Name" id="name" placeholder="Name"/>
                </div>

                <div class="form-group">
                    <label for="email"><span class="fieldInfo">Email:</span></label>
                    <input class="form-control" type="email" name="Email" id="email" placeholder="Email"/>
                </div>

                <div class="form-group">
                    <label for="commentarea"><span class="fieldInfo">Comment Box:</span></label>
                    <textarea class="form-control" name="Comment" id="commentarea"></textarea>
                </div>
                <br/>
                <input style="margin-bottom:10px;" class="btn btn-success btn-block" type="submit" name="Submit" value="Submit Comment">
              </fieldset>
            </form>
          </div>
        </div><!--main blog ending-->

        <div class="offset-sm-1 col-sm-3"><!--sidebar area-->

          <div class="sidebarpost img-thumbnail">
            <h4>About Developer</h4>
            <img style="width:100px; height:100px;" src="images/user.jpg" class="mx-auto d-block rounded-circle img-responsive"/>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               Ut enim ad minim veniam.</p>
          </div>

          <div class="card text-black mb-3" style="max-width: 18rem;"> <!--categories-->
            <div class="card-header bg-primary text-white">Categories</div>
            <div class="card-body">
              <!-- <h5 class="card-title">Primary card title</h5> -->

              <div class="list-group">
                  <?php
                   global $connection;
                   $query = "select * from category";
                   $execute = mysqli_query($connection, $query);

                   while($DataRows = mysqli_fetch_array($execute)) {
                     $id = $DataRows['id'];
                     $name = $DataRows['name'];

                     $category = null;

                     if(isset($_GET['category'])) {
                         $category = $_GET['category'];
                     }

                     if($name === $category) {
                  ?>
                       <a href="blog.php?category=<?php echo $name?>" class="list-group-item list-group-item-action active"><?php echo $name;?></a>
                   <?php } else {?>

                   <a href="blog.php?category=<?php echo $name?>" class="list-group-item list-group-item-action"><?php echo $name;?></a>
                 <?php } }?>
               </div>
           </div>
            <div class="card-footer bg-transparent border-primary">Footer</div>
          </div> <!--categories ending-->

          <div class="card text-black mb-3" style="max-width: 18rem;"> <!--recent post-->
            <div class="card-header bg-primary text-white">Recent Post</div>
              <?php
                 global $connection;
                 $recentQuery = "select * from admin_panel order by id desc limit 0, 5";
                 $recentExecute = mysqli_query($connection, $recentQuery);

                 while($DataRows = mysqli_fetch_array($recentExecute)) {
                   $id = $DataRows['id'];
                   $datetime = $DataRows['datetime'];
                   $title = $DataRows['title'];
                   $image = $DataRows['image'];
                   $post = $DataRows['post'];

                   if(strlen($post) > 20) {
                     $post = substr($post, 0, 20)."...";
                   }

                   if(strlen($datetime) > 16) {
                       $datetime = substr($datetime, 0, 16)."...";
                   }
              ?>

              <div class="media" style="margin-top:10px;">
                <img width="80px" height="80px" class="align-self-start mr-3" src="upload/<?php echo $image;?>" alt="Generic placeholder image">
                <div class="media-body">
                  <h5 class="mt-0"><a href="FullBlogPost.php?id=<?php echo $id;?>"><p class="card-title heading"><?php echo $title?></p></a></h5>
                  <p class="card-text"><?php echo $post;?></p>
                  <p class="card-text"><small class="text-muted"><?php echo "Posted on: ".$datetime?></small></p>
                </div>
              </div>

               <!-- <div class="card-body">
                  <img class="card-img-top" src="upload/<?php echo $image;?>" alt="Card image cap">
                  <a href="FullBlogPost.php?id=<?php echo $id;?>"><p class="card-title heading"><?php echo $title?></p></a>
                  <p class="card-text"><?php echo $post;?></p>
                  <p class="card-text"><small class="text-muted"><?php echo "Posted on: ".$datetime?></small></p>
               </div> -->
               <div class="card-header bg-transparent border-primary"></div>
             <?php }?>
          </div> <!--recent post ending-->

          <!-- <div class="sidebarpost img-thumbnail">
            <h2>Test</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
               ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                 eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                 eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div> -->
        </div><!--sidebar ending-->
      </div><!--row ending-->
    </div><!--container ending-->

    <div class="footer"> <!--footer area-->
      <p>Theme by | Anik Roy Gourab |&copy;All rights reserved.</p>
    </div>
    <div style="height:10px; background:#27aae1;"></div><!--footer ending-->
  </body>
</html>
