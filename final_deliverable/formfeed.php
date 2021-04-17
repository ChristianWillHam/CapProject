<!--/////////////// Post Form //////////// -->
<div class="container">
  <div class = "row">
    <div class = "formpanel">

      <form method = "POST" class="formparent" action = "includes/postform.inc.php">
        <textarea style= "resize: none;" name="text" cols="40" rows="5" placeholder="Type your message here..."></textarea>

        <br>
        <input type="submit" name="sumbitPost" id="submitPost"></input>

      </form>
      </div>
  </div><!-- row -->


  <!--/////////////// Post Feed //////////// -->
  <?php
    include_once "feed.php";
?>
</div>
