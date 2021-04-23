<?php

function send(){
  session_start();
  $result;

  include_once "dbh.inc.php";

  $user_id = $_SESSION['user_id'];
  $text = $_POST['text'];
  $charlimit = 250;

//If the user is signed in, send a query with their ID, else leave the id field blank
  if(isset($_SESSION["user_id"]) === true){
      $send_query = "INSERT INTO post(poster_id, text, time) VALUES ('$user_id', '$text', now());";
    } else{
          $send_query = "INSERT INTO post(poster_id, text, time) VALUES (NULL, '$text', now());";
        }

    //Execute the query
    mysqli_query($connect, $send_query);

    header("location: ../index.php");
}

send();
