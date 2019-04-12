<?php require_once("include/DB.php");?>
<?php require_once("include/Functions.php"); ?>
<?php require_once("include/Sessions.php"); ?>

<?php
  if(isset($_GET['approve'])) {
    global $connection;

    $IdFromUrl = $_GET['approve'];
    $approvedBy = $_SESSION['username'];

    $ViewQuery = "update comments set status='ON', approvedby='$approvedBy' where id='$IdFromUrl'";

    $execute = mysqli_query($connection, $ViewQuery);

    if($execute) {
      $_SESSION["SuccessMessage"] = "Comment approved successfully";
      Redirect_to("comments.php");
    } else {
      $_SESSION["ErrorMessage"] = "Comment cannot be approved. Check your internet connection!";
      Redirect_to("comments.php");
    }
  }

  else if(isset($_GET['unapprove'])) {
    $IdFromUrl = $_GET['unapprove'];
    $approvedBy = $_SESSION['username'];

    $ViewQuery = "update comments set status='OFF', approvedby='pending...' where id='$IdFromUrl'";

    $execute = mysqli_query($connection, $ViewQuery);

    if($execute) {
      $_SESSION["SuccessMessage"] = "Comment un-approved successfully";
      Redirect_to("comments.php");
    } else {
      $_SESSION["ErrorMessage"] = "Comment cannot be un-approved. Check your internet connection!";
      Redirect_to("comments.php");
    }
  }

  else if(isset($_GET['delete'])) {
    $IdFromUrl = $_GET['delete'];

    $ViewQuery = "delete from comments where id={$IdFromUrl}";

    $execute = mysqli_query($connection, $ViewQuery);

    if($execute) {
      $_SESSION["SuccessMessage"] = "Comment deleted successfully";
      Redirect_to("comments.php");
    } else {
      $_SESSION["ErrorMessage"] = "Comment cannot be deleted. Check your internet connection!";
      Redirect_to("comments.php");
    }
  }
?>
