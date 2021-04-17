<div class = "row nav-container">
  <div class = "header navbar container">
    <a href="index.php" class="navbar-brand">µMsg</a>
    <?php
    session_start();
      //Show register and login links if not logged in
      if(!isset($_SESSION["user_id"])){
        echo "<a href = \"login.php\">LOGIN</a>";
        echo "<a href = \"signup.php\">SIGN UP</a>";
      } else {
        echo "Logged in as " . $_SESSION["user_id"];
        echo "<a href=\"includes/logout.inc.php\">LOGOUT</a>";
      }
      ?>
  </div> <!-- header -->
</div> <!-- row -->
