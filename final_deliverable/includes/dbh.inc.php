<?php

$servername = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbname = "website";

//Connect to the database. The database is stored in the $connect variable
//for the rest of the program.
$connect = mysqli_connect($servername, $dbUserName, $dbPassword, $dbname);

//Terminate the program if the connection failed.
if(!$connect){
  die("Connection Failed" . mysqli_connect_error());
}
