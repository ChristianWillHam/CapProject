<?php

function send(){
  session_start();
  $result;

  include_once "dbh.inc.php";

  $user_id = $_SESSION['user_id'];
  $text = $_POST['text'];
  $charlimit = 250;

  if(isset($_SESSION["user_id"]) === true){
      $send_query = "INSERT INTO post(poster_id, text, time) VALUES ('$user_id', '$text', now());";
    } else{
          $send_query = "INSERT INTO post(poster_id, text, time) VALUES (NULL, '$text', now());";
        }

    mysqli_query($connect, $send_query);

    header("location: ../index.php");
}

send();
