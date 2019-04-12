<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>

<?php
  if(isset($_GET['id'])) {
    global $connection;
    $IdFromLink = $_GET['id'];
    $DeleteQuery = "delete from admin_registration where id={$IdFromLink}";
    $execute = mysqli_query($connection, $DeleteQuery);

    if($execute) {
      $_SESSION['SuccessMessage'] = "Admin deleted successfully.";
      Redirect_to("Admins.php");
    } else {
      $_SESSION['ErrorMessage'] = "Admin $IdFromLink cannot be deleted. Check your internet connection.";
      Redirect_to("Admins.php");
    }
  }
?>
