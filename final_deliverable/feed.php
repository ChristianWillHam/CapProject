<?php
include "includes/dbh.inc.php";

function loadPosts($loadCount){
  include "includes/dbh.inc.php";
  $sql = mysqli_query($connect, "SELECT * FROM post ORDER BY time DESC LIMIT " . $loadCount);

//While there is still a row left in the databse
  while( $row = mysqli_fetch_array($sql)){

    $user_id = $row ['poster_id'];

//If there is no user id, call their ID "Anonymous"
    if($user_id === NULL){
      $user_id = "Anonymous";
    }
    $text = $row ['text'];
    $time = $row ['time'];

    //Echo this html, which is the format for a feed div

    echo "<div class = \"row\">";
      echo "<div class = \"postparent\">";
        echo "<h3 class=\"post-username\">$user_id</h3>";
          echo "<h6 class=\"post-userid\">$time</h6>";
          echo "<hr>";
          echo "<div class = \"postdiv\">";
            echo "<p class=\"posttext\">$text</p>";
          echo "</div>";
      echo "</div>";
    echo "</div>";
  }
}

//Count is no longer being utilized here, as the feed simply loads everything from the database.
//A more advanced implementation would likely use this variable.
$count = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM post"));
loadPosts($count);
