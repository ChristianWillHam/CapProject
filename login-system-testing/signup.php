<!DOCTYPE HTML>

<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <div class = "container">
      <div class="row">

  				<div class= "col-12">

  					<div class= "header">
  						<h1>Social Media Site</h1>
  						<h4>A practice program for messing around</h4>

  					</div><!--header -->

  				</div><!-- col -->

  			</div><!-- row 1-->

        <div class="row">

    				<div class= "col-12">

    					<div class= "menu_option">
                <a href="index.php">Home</a>
                <a href="login.php">Login</a>
                <a href="signup.php">Create Account</a>


    					</div><!--header -->

    				</div><!-- col -->

    			</div><!-- row 2-->

        <div class="row">

    				<div class= "col-12">

    					<div class= "text box">
                <h2>Sign Up</h2>
                <form action = "includes/signup.inc.php" method = "post">
                  <input type="text" name="user_id" placeholder = "Username">
                  <br>
                  <input type="password" name="password" placeholder = "Password">
                  <br>
                  <input type="password" name="passwordCfrm" placeholder = "Retype Password">
                  <br>
                  <input type="submit" name="createAcct" value="Submit" />

                </form>

                <?php
                    if(isset($_get['error'])){
                      if($_get['error'] == 'emptyinput'){
                        echo "All fields must be filled in!";
                      }
                      else if($_get['error'] == 'invalidUID'){
                        echo "Your username cannot be more than 25 characters long!";
                      }
                      else if($_get['error'] == 'pwdmismatch'){
                        echo "Both password inputs must match";
                      }
                      else if($_get['error'] == 'uidexists'){
                        echo "That user ID is already taken!";
                      }
                      else if($_get['error'] == 'none'){
                        echo "You have signed up!";
                      }
                    }
                ?>


    					</div><!--header -->

    				</div><!-- col -->

    			</div><!-- row 2-->




      </div><!-- container>



      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>



</html>
