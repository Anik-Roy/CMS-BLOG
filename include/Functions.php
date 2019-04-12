<?php require_once("include/DB.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
	  exit;
}

function Login_Attempt($Username,$Password){
    global $connection;
    $query = "select * from admin_registration where adminname='$Username' and password='$Password'";
    $execute=mysqli_query($connection, $query);

    if($execute) {
      $admin=mysqli_fetch_assoc($execute);

      if($admin) {
  	     return $admin;
      } else {
        return null;
      }
    }
}

function Login(){
    if(isset($_SESSION["User_Id"])) {
	     return true;
    }
}

function Confirm_Login(){
    if(!Login()){
	     $_SESSION["ErrorMessage"]="Login Required!";
	     Redirect_to("Login.php");
    }
 }
?>
