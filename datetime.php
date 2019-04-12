<?php
  date_default_timezone_set("Asia/Dhaka");
  $currentTime = time();
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);
  echo $DateTime;
?>
