<!DOCTYPE html>

<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>


  <body>

    <div class = "container">
      <?php
        include_once "header.php";
        ?>
        <div class = "row">
          <h2 class = "login-header">Sign Up</h2>
        </div>

        <form action = "includes/signup.inc.php" method = "post">
        <div class = "row">
          <input type="text" name="user_id" placeholder = "Username" class="login-field">
        </div>
        <div class="row">
          <input type="password" name="password" placeholder = "Password" class="login-field">
        </div>
        <div class="row">
          <input type="password" name="passwordCfrm" placeholder = "Retype Password" class="login-field">
        </div>
        <div class="row">
          <input type="submit" name="createAcct" value="Submit" class="login-field"/>
        </div>
        </form>

        <?php

        //This code checks for get methods indicating an error, and echos the
        //appropriate error message
          if(isset($_GET['error'])){

            if($_GET['error'] === "emptyinput"){
              echo "Please fill out all fields!";
              echo "<br>";
            }

            if($_GET['error'] === "invalidUID"){
              echo "That username is invalid!";
              echo "<br>";
            }

            if($_GET['error'] === "pwdmismatch"){
              echo "Passwords do not match!";
              echo "<br>";
            }

            if($_GET['error'] === "uidexists"){
              echo "That username already exists!";
              echo "<br>";
            }

          }
        ?>

    </div> <!-- container -->



    <!-- bootstrap setup script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>


</html>
