<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>

<?php
    $_SESSION['User_Id'] = null;
    $_SESSION['username'] = null;
    session_destroy();
    Redirect_to("Login.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- <script type="text/javascript">
      function confirmDialog() {
        var r = confirm("Do you want to logout?");
          if (r == true) {
            return true;
        } else {
          return false;
        }
      }
    </script> -->
  </body>
</html>
