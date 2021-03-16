<!DOCTYPE HTML>
<html>

<head>


</head>

<body>
  <?php
  if(isset($_POST['retrieve'])) {
         retrieve();
     }

  function retrieve(){

      error_reporting(0);
      ini_set('display_errors', 0);

    try{
        if (!($con = mysqli_connect('localhost', 'root', '', 'website'))){
            throw new Exception('Unable to connect');
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        die();
    }


          $retrive_query = "SELECT * FROM post";
          $result = mysqli_query($con, $retrive_query);
          $resultcheck = mysqli_num_rows($result);
          if($resultcheck > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo $row['poster_id'],' ', $row['text'], '<br>';
            }

            $row = mysqli_fetch_assoc($result);
            echo $row['poster_id'], "    ", $row['text'];
          }
}


   ?>

   <form method = 'post'>
    <input type="submit" name="retrieve" value="Retrieve" />
  </form>

  <br>

  <form method = 'post'>

    <label for = user_id>Username</label>
    <input type = 'text' name = 'user_id'>
    <br>
    <label for = text>Text</label>
    <input type = 'text' name = 'text'>
    <br>
    <input type="submit" name="send" value="Send" />
  </form>

    <?php

    if(isset($_POST['send'])) {
           send();
           echo "worked";
       }



    function send(){

      try{
          if (!($con = mysqli_connect('localhost', 'root', '', 'website'))){
              throw new Exception('Unable to connect');
          }
      }
      catch(Exception $e)
      {
          echo $e->getMessage();
          die();
      }

        $user_id = $_POST['user_id'];
        $text = $_POST['text'];

        $sql = "INSERT INTO post(poster_id, text, time) VALUES ('$user_id', '$text', now());";

        $result = mysqli_query($con, $sql);
        echo $result;
    }


    ?>


</body>

</html>
