<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>

<?php
  if(isset($_GET['id'])) {
    global $connection;
    $IdFromLink = $_GET['id'];
    $DeleteQuery = "delete from category where id={$IdFromLink}";
    $execute = mysqli_query($connection, $DeleteQuery);

    if($execute) {
      $_SESSION['SuccessMessage'] = "Category deleted successfully.";
      Redirect_to("categories.php");
    } else {
      $_SESSION['ErrorMessage'] = "Category cannot be deleted. Check your internet connection.";
      Redirect_to("categories.php");
    }
  }
?>
