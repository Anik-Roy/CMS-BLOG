<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/publicstyles.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
      .col-sm-8 {

      }

      .col-sm-3 {
          /* background-color: green;
          height: -moz-fit-content;
          height: fit-content; */
          display: table;
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

      <div class="row"><!--row area-->
        <div class="col-sm-8"><!--main blog area-->
          <?php
            global $connection;

            if(isset($_GET['Submit'])) {
              $search = $_GET['Search'];
              $ViewQuery = "select * from admin_panel
                where datetime like '%$search%' or title like '%$search%' or category like '%$search%'
                or author like '%$search%' or post like '%$search%' order by id desc";
            } else if(isset($_GET['page'])) {
              $pageNumber = $_GET['page'];
              $showPostFrom = $pageNumber*5-5;

              global $connection;
              $queryPagination = "select count(*) from admin_panel";
              $executePagination = mysqli_query($connection, $queryPagination);
              $rowPagination = mysqli_fetch_array($executePagination);
              $totalPost = array_shift($rowPagination);
              $postPerPage = ceil($totalPost/5);

              if($pageNumber <= 0) {
                $showPostFrom = 0;
                $pageNumber = 1;
              }

              else if($pageNumber > $postPerPage) {
                $pageNumber = $pageNumber - 1;
                $showPostFrom = $pageNumber*5-5;
              }

              $ViewQuery = "select * from admin_panel order by id desc limit $showPostFrom, 5";

            } else if(isset($_GET['category'])) {
              $category = $_GET['category'];
              $ViewQuery = "select * from admin_panel where category = '$category' order by id desc";

            } else {
              $ViewQuery = "select * from admin_panel order by id desc limit 0,5";
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
              <p class="post"><?php if(strlen($post) > 150) {
                $post = substr($post, 0, 150)."...";
                $flag = true;
              }
               echo htmlentities($post);?></p>
            </div>

            <?php
              $connection;
              $CommentQuery = "select count(*) from comments where admin_panel_id={$id}";
              $CommentExecute = mysqli_query($connection, $CommentQuery);
              $RowsApproved = mysqli_fetch_array($CommentExecute);
              $TotalApproved = array_shift($RowsApproved);
              /*another way of counting number of row
                $connection;
                $CommentQuery = "select * from comments where admin_panel_id={$id} and status='ON'";
                $CommentExecute = mysqli_query($connection, $CommentQuery);
                $RowsApproved = mysqli_num_rows($CommentExecute);
                echo $RowsApproved;
              */
            ?>
            <i class="fa fa-comment" style="margin-right:10px; font-size:18px; border: 1px solid #ddd; padding:5px;"></i><?php echo $TotalApproved;?>

            <?php //if($flag) {?>
              <a href="FullBlogPost.php?id=<?php echo $id;?>"><span class="btn btn-info" style="float:right">Read More &rsaquo;&rsaquo;</span></a>
            <?php //}?>
          </div>

        <?php }?>

        <?php
          if(!isset($_GET['category'])) {
        ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <?php
              if(isset($_GET['page']) && $_GET['page'] > 1) {
            ?>
              <li class="page-item">
                <a class="page-link" href="blog.php?page=<?php echo 1;?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>

              <li class="page-item">
                <?php
                  if(isset($_GET['page'])) {
                    $curPage = $_GET['page'];
                    $destPage = $curPage - 1;

                    if($destPage <= 0)
                      $destPage = 1;
                  }
                  else {
                    $destPage = 1;
                  }
                ?>
                <a class="page-link" href="blog.php?page=<?php echo $destPage;?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
            <?php }?>

          <?php
            global $connection;
            $queryPagination = "select count(*) from admin_panel";
            $executePagination = mysqli_query($connection, $queryPagination);
            $rowPagination = mysqli_fetch_array($executePagination);
            $totalPost = array_shift($rowPagination);
            $postPerPage = ceil($totalPost/5);

            for($i = 1; $i <= $postPerPage; $i++) {
              $activePage = 1;

              if(isset($_GET['page'])) {
                $activePage = $_GET['page'];
              }

              if($activePage == $i) {
            ?>
              <li class="page-item active">
                    <a href="blog.php?page=<?php echo $i;?>" class="page-link"><?php echo $i;?></a>
              </li>
            <?php } else {?>
                      <li class="page-item">
                            <a href="blog.php?page=<?php echo $i;?>" class="page-link"><?php echo $i;?></a>
                      </li>
                    <?php }?>
            <?php }?>

            <?php
              if((isset($_GET['page']) && $_GET['page'] < $postPerPage) || (!isset($_GET['page']) && $postPerPage > 1)) {
            ?>
              <li class="page-item">
                <?php
                  if(isset($_GET['page'])) {
                    $curPage = $_GET['page'];

                    if($curPage <= 0) {
                      $curPage = 0;
                    }

                    $destPage = $curPage + 1;
                  }
                  else {
                    $curPage = 1;
                    $destPage = $curPage+1;
                  }

                  if($destPage > $postPerPage)
                    $destPage = $postPerPage;
                ?>

                <a class="page-link" href="blog.php?page=<?php echo $destPage;?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>

              <li class="page-item">
                <a class="page-link" href="blog.php?page=<?php echo $postPerPage;?>" aria-label="Next">
                  <span aria-hidden="true">&raquo&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            <?php }?>
          </ul>
        </nav>
      <?php }?>
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
            <div class="card-header text-white bg-primary">Recent Post</div>
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
