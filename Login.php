<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>

<?php
  if(isset($_POST["Submit"])) {
    $userName = mysqli_real_escape_string($connection, $_POST["Username"]);
    $password = mysqli_real_escape_string($connection, $_POST["Password"]);

    date_default_timezone_set("Asia/Dhaka");
    $currentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    if(empty($userName) || empty($password)) {
      $_SESSION['ErrorMessage'] = "All fields must be required.";
      Redirect_to("Login.php");
      exit;
    } else {
      $foundAccount = Login_Attempt($userName, $password);
      if($foundAccount) {
        $_SESSION['User_Id'] = $foundAccount['id'];
        $_SESSION['username'] = $foundAccount['adminname'];
        $_SESSION['SuccessMessage'] = "Welcome ".$_SESSION['username'];
        Redirect_to("dashboard.php");

      } else {
        $_SESSION['ErrorMessage'] = "Username/password not matched.";
        Redirect_to("Login.php");
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Admins</title>
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

      body {
        background-color: #fff;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="images/logo.JPG" width="50" height="50" alt="" style="border-radius:50%">
        Tech Info
      </a>
    </nav>
    <div style="height:10px; background:#27aae1;"></div>

    <div class="container-fluid">
      <div class="row">
        <div class="offset-sm-4 col-sm-4">
          <br/><br/>
          <h2>Login Page</h2>
          <div><?php echo Message(); echo SuccessMessage();?></div>
          <div>
            <form action="Login.php" method="post">
              <div class="form-group">
                <fieldset>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>

                    <input class="form-control" type="text" name="Username" id="Username" placeholder="Username"/>
                  </div>
                </fieldset>
              </div>

              <div class="form-group">
                <fieldset>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt"></i></span>
                    </div>

                    <input class="form-control" type="password" name="Password" id="Password" placeholder="Password"/>
                  </div>
                </fieldset>
              </div>

              <input class="btn btn-success btn-block" type="submit" name="Submit" value="Login">
            </form>
          </div>
        </div> <!--ending of main area-->
      </div> <!--ending of row-->
    </div> <!--ending of container-->

    <div class="footer fixed-bottom">
      <p>Theme by | Anik Roy Gourab |&copy;All rights reserved.</p>
    </div>
  </body>
</html>
