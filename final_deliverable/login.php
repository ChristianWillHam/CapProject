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


        <h2>Login</h2>

          <form action = "includes/login.inc.php" method = "post" >
            <input type="text" name="user_id" placeholder = "Username">
            <br>
            <input type="password" name="password" placeholder = "Password">
            <br>
            <input type="submit" name="login" value="Submit" />
        </form>

      <?php
        if(isset($_GET['error'])){
          if($_GET['error'] === "emptyinputlogin"){
            echo "Please fill out all fields!";
            echo "<br>";
          }

          if($_GET['error'] === "loginFailedUID"){
            echo "That User ID does not exist!";
            echo "<br>";
          }

          if($_GET['error'] === "loginFailedPass"){
            echo "Password incorrect!";
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
