<div class = "row">
  <div class = "header">

    <h1>Chat</h1>

  </div> <!-- header -->
</div> <!-- row -->


<!--//////////////////////////// MENU //////////////////////////-->
<div class = "row">

  <div class = "col-lg-4">
    <div class = "menu-item">
      <a href = "index.php">Home</a>
    </div>
  </div><!-- column -->

<?php
////////If the user isn't logged in
  if(isset($_SESSION["user_id"]) === false){
    echo "<div class = \"col-lg-4\">";
      echo "<div class = \"menu-item\">";
        echo "<a href = \"login.php\">Login</a>";
      echo "</div>";
    echo "</div><!-- column -->";


    echo "<div class = \"col-lg-4\">";
      echo "<div class = \"menu-item\">";
        echo "<a href = \"signup.php\">Sign Up</a>";
      echo "</div>";
    echo "</div><!-- column -->";

///////If they are logged in
  } else {

    echo "<div class = \"col-lg-4\">";
      echo "<div class = \"menu-item\">";
        echo "Welcome ";
        echo $_SESSION["user_id"];
        echo "!";
      echo "</div>";
    echo "</div><!-- column -->";

    echo "<div class = \"col-lg-4\">";
      echo "<div class = \"menu-item\">";
        echo "<a href = \"includes/logout.inc.php\">Logout</a>";
      echo "</div>";
    echo "</div><!-- column -->";


  }
?>


</div><!-- row -->
