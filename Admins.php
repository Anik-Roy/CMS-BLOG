<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php Confirm_Login();?>

<?php
  if(isset($_POST["Submit"])) {
    $userName = mysqli_real_escape_string($connection, $_POST["Username"]);
    $password = mysqli_real_escape_string($connection, $_POST["Password"]);
    $confirmPassword = mysqli_real_escape_string($connection, $_POST["ConfirmPassword"]);

    date_default_timezone_set("Asia/Dhaka");
    $currentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    if(empty($userName)) {
      $_SESSION['ErrorMessage'] = "Username cannot be empty.";
      Redirect_to("Admins.php");
      exit;
    } else if(strlen($userName) > 99) {
      $_SESSION['ErrorMessage'] = "Username is too long.";
      Redirect_to("Admins.php");
    } else if(empty($password)) {
      $_SESSION['ErrorMessage'] = "Password cannot be empty.";
      Redirect_to("Admins.php");
      exit;
    } else if(strlen($password) < 4) {
      $_SESSION['ErrorMessage'] = "Atleast 4 characters for password.";
      Redirect_to("Admins.php");
      exit;
    } else if($password !== $confirmPassword) {
      $_SESSION['ErrorMessage'] = "Password not matched";
      Redirect_to("Admins.php");
      exit;
    } else {
      global $connection;
      $admin = $_SESSION['username'];
      $query = "insert into admin_registration(datetime, adminname, creatorname, password) values('$DateTime', '$userName', '$admin', '$password')";
      $execute = mysqli_query($connection, $query);

      if($execute) {
        $_SESSION['SuccessMessage'] = "Admin added successfully";
        Redirect_to("Admins.php");
      } else {
        $_SESSION['ErrorMessage'] = "Admin cannot be added. Please check your internet connection...";
        Redirect_to("Admins.php");
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Admins</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminstyles.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style media="screen">
      .fieldInfo {
        color: #218838;
        font-size: 18px;
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
          <h2>Anik Roy Gourab</h2>

          <ul id="SideMenu" class="nav flex-column nav-pills my_nav">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="AddNewPost.php"><i class="fa fa-plus-square"></i>Add new post</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="categories.php"><i class="fa fa-tags"></i>Categories</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="Admins.php"><i class="fa fa-user"></i>Manage Admins</a>
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
          <h2>Manage Admins Access</h2>
          <div><?php echo Message(); echo SuccessMessage();?></div>
          <div>
            <form action="Admins.php" method="post">
              <div class="form-group">
                <fieldset>
                  <label for="Username"><span class="fieldInfo">Username:</span></label>
                  <input class="form-control" type="text" name="Username" id="Username" placeholder="Username"/>
                </fieldset>
              </div>

              <div class="form-group">
                <fieldset>
                  <label for="Password"><span class="fieldInfo">Password:</span></label>
                  <input class="form-control" type="password" name="Password" id="Password" placeholder="Password"/>
                </fieldset>
              </div>

              <div class="form-group">
                <fieldset>
                  <label for="ConfirmPassword"><span class="fieldInfo">Confirm Password:</span></label>
                  <input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Retype same password"/>
                </fieldset>
              </div>

              <input class="btn btn-success btn-block" type="submit" name="Submit" value="Add New Admin">
            </form>
          </div>

          <div class="myTable table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>No.</th>
                  <th>Date & Time</th>
                  <th>Admin Name</th>
                  <th>Creator Name</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php
                global $connection;

                $getCategory = "select * from admin_registration order by id desc";
                $execute = mysqli_query($connection, $getCategory);

                $cnt = 0;
                while($DataRows = mysqli_fetch_array($execute)) {
                  $id = $DataRows['id'];
                  $datetime = $DataRows['datetime'];
                  $adminname = $DataRows['adminname'];
                  $creatorname = $DataRows['creatorname'];
                  $adminpassword = $DataRows['password'];
                  $cnt++;
              ?>

              <tbody>
                <tr>
                  <td><?php echo $cnt?></td>
                  <td><?php echo $datetime?></td>
                  <td><?php echo $adminname?></td>
                  <td><?php echo $creatorname?></td>
                  <td><button id="<?php echo $id?>" onclick="confirmDialog(this.id);" class="btn btn-danger">Delete</button></td>

                  <script>
                    function confirmDialog(ID) {
                      var txt;
                      console.log(ID);
                      var r = confirm("Are you sure to delete this admin?");
                        if (r == true) {
                          window.location = `DeleteAdmin.php?id=${ID}`;
                      } else {

                      }
                    }
                  </script>
                </tr>
              </tbody>
            <?php }?>
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
