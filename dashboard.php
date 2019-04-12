<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php Confirm_Login();?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminstyles.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
            <a class="nav-link active" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php" target="_blank">Blog</a>
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <h2><?php echo $_SESSION['username']?></h2>

          <ul id="SideMenu" class="nav flex-column nav-pills my_nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="AddNewPost.php"><i class="fa fa-plus-square"></i>Add new post</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="categories.php"><i class="fa fa-tags"></i>Categories</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="Admins.php"><i class="fa fa-user"></i>Manage Admins</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="comments.php"><i class="fa fa-comments"></i>Comments
              <?php
                $connection;
                $cQ = "select count(*) from comments where status='OFF'";
                $cE = mysqli_query($connection, $cQ);
                $rUnapproved = mysqli_fetch_array($cE);
                $tUnapproved = array_shift($rUnapproved);
                /*another way of counting number of row
                  $connection;
                  $CommentQuery = "select * from comments where admin_panel_id={$id} and status='ON'";
                  $CommentExecute = mysqli_query($connection, $CommentQuery);
                  $RowsApproved = mysqli_num_rows($CommentExecute);
                  echo $RowsApproved;
                */

                if($tUnapproved > 0) {

                ?>
                <span style="margin-left:10px;" class="badge badge-warning"><?php echo $tUnapproved;?></span>

              <?php }?>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="blog.php" target="_blank"><i class="fa fa-rss-square"></i>Live Blogs</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="Logout.php"><i class="fa fa-sign-in"></i>Logout</a>
            </li>

          </ul>

        </div>

        <div class="col-sm-10">
          <h2>Admin Dashboard</h2>

          <div><?php echo Message(); echo SuccessMessage();?></div>

          <div class="myTable table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>No.</th>
                  <th width=11%>Post Title</th>
                  <th width=11%>Date & Time</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Banner</th>
                  <th>Comments</th>
                  <th width=15%>Action</th>
                  <th width=14%>Details</th>
                </tr>
              </thead>

              <?php
                global $connection;

                $ViewQuery = "select * from admin_panel order by id desc";

                $execute = mysqli_query($connection, $ViewQuery);

                $cnt = 0;
                while($DataRows = mysqli_fetch_array($execute)) {
                  $id = $DataRows["id"];
                  $datetime = $DataRows["datetime"];
                  $title = $DataRows["title"];
                  $category = $DataRows["category"];
                  $author = $DataRows["author"];
                  $image = $DataRows["image"];
                  $post = $DataRows["post"];
                  $cnt++;
                  ?>

              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>

                  <td style="color:#277273"><?php
                    if(strlen($title) > 15) {
                      $title = substr($title, 0, 15)."...";
                    }
                    echo $title;?>
                  </td>

                  <td>
                    <?php
                      if(strlen($datetime) > 15) {
                        $datetime = substr($datetime, 0, 15)."...";
                      }
                      echo $datetime;?>
                  </td>

                  <td><?php echo $author?></td>

                  <td>
                    <?php
                      if(strlen($category) > 8) {
                        $category = substr($category, 0, 8)."...";
                      }
                      echo $category;
                    ?>
                  </td>

                  <td><img src="upload/<?php echo $image;?>" style="width:100px; height:50px"/></td>

                  <td>
                    <?php
                      $connection;
                      $CommentQuery = "select count(*) from comments where admin_panel_id={$id} and status='ON'";
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

                      if($TotalApproved > 0) {
                    ?>
                    <span class="badge pull-right badge-success"><?php echo $TotalApproved;?></span>

                  <?php }?>

                  <?php
                    $connection;
                    $CommentQuery = "select count(*) from comments where admin_panel_id={$id} and status='OFF'";
                    $CommentExecute = mysqli_query($connection, $CommentQuery);
                    $RowsUnapproved = mysqli_fetch_array($CommentExecute);
                    $TotalUnapproved = array_shift($RowsUnapproved);
                    /*another way of counting number of row
                      $connection;
                      $CommentQuery = "select * from comments where admin_panel_id={$id} and status='ON'";
                      $CommentExecute = mysqli_query($connection, $CommentQuery);
                      $RowsApproved = mysqli_num_rows($CommentExecute);
                      echo $RowsApproved;
                    */

                    if($TotalUnapproved > 0) {
                  ?>
                  <span class="badge pull-left badge-warning"><?php echo $TotalUnapproved;?></span>

                  <?php }?>
                  </td>

                  <td><a href="EditPost.php?edit=<?php echo $id;?>" target="_blank" class="btn btn-warning"><span style="color:#fff">Edit</span></a> <a href="DeletePost.php?delete=<?php echo $id;?>" target="_blank" class="btn btn-danger"><span style="color:#fff">Delete</span></a></td>

                  <td><a href="FullBlogPost.php?id=<?php echo $id;?>" target="_blank" class="btn btn-primary"><span style="color:#fff">Live Preview</span></a></td>
                </tr>
              </tbody>
              <?php } ?>

            </table>
          </div>
        </div> <!--ending of main area-->
      </div> <!--ending of row-->
    </div> <!--ending of container-->

    <div class="footer">
      <p>Theme by | Anik Roy Gourab |&copy;All rights reserved.</p>
    </div>
    <div style="height:10px; background:#27aae1;"></div>
  </body>
</html>
