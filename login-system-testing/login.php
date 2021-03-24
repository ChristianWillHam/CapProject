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
                <h2>Sign In</h2>
                <form action = "includes/login.inc.php" method = "post" >
                  <input type="text" name="User ID" placeholder = "Username">
                  <br>
                  <input type="password" name="Password" placeholder = "Password">
                  <br>
                  <input type="submit" name="login" value="Submit" />

                </form>


    					</div><!--header -->

    				</div><!-- col -->

    			</div><!-- row 2-->




      </div><!-- container>



      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>



</html>
