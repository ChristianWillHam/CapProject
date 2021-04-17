<!--/////////////// Post Form //////////// -->
<div class = "row">
  <div class = "formpanel"></div>

    <form action = "includes/postform.inc.php" method = "POST">

      <textarea style= "resize: none;" name="text" cols="40" rows="5"></textarea>

      <br>

      <input type="submit" name="sumbitPost"></input>

    </form>
</div><!-- row -->


<!--/////////////// Post Feed //////////// -->
<div class = "row">
  <div class = "postparent">
    <h2>This is the parent div for the posts</h2>
    <?php
      include_once "feed.php";
     ?>
  </div>
</div>
