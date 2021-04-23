<?php
//Delete any SESSION variables
  session_start();
  session_unset();
  session_destroy();
header("location: ../index.php");
