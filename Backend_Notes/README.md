# PHP and Databases Research Notes

## Contents

<ol>
<li>Client-side and Server-side</li>
<li>Create an internal Server on your PC</li>
<li>Our Database so far</li>
<li>The anon problem</li>
<li>HTTP Requests and Retrieving Data from the Database</li>
<li>Sending Data to the Database</li>
</ol>

## 1. Client-side and Server-side

There are two components to websites that we should be concerned with in this project, the client and the server. A client-side process is one that happens on the user's computer, whereas a server-side process is one that happens in the cloud. For this project, it is important to remember which processes are happening client-side, and which processes are happening server-side.

#### Client-side Processes
<ul>
<li>HTML, CSS, and any Front End Framework</li>
<li>JavaScript code</li>
</ul>

#### Server-side Processes
<ul>
<li>PHP Code</li>
<li>Databases (MySQL)</li>
</ul>

You can think of the client and the server as two different containers for code. Any process can easily communicate with a process in its container, but cannot (easily) communicate with processes from another container. If you have worked with HTML and JavaScript, you know that communicating from an HTML file to a JavaScript file is as easy as typing one line of code. It's similarly easy for PHP code to communicate with a database. However communicating from an HTML file to a PHP file requires us to build a bridge between the client and the server. This bridge is an HTTP request, which I talk about more in Section 5.

## 2. Create an internal server on your PC

One important thing to know is that if you want to work with server-side code such as PHP, you will need a server to run it on. If you are just working on the front-end you can skip this step for now, but if you want to test our website as whole, you will need a local server.

Here is a really straightforward tutorial on how to set this up:
https://www.youtube.com/watch?v=mXdpCRgR-xE&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-

I had a ton of errors trying to get this set up, but I think that was mostly a result of other software I had on my computer that was conflicting with XAMPP. Hopefully your installation will be smooth, but if you get any errors that you're unable to resolve, reach out to me and I may be able to help diagnose.

Once I got the server set up, I created a folder in the htdocs called CapProject and used GitHub desktop to clone our github repository into there. That way, I can simply pull from the git repository and my server will automatically be updated with any code you guys push. You guys should probably do this too if you want to make things a lot easier.

I know I set up the whole google cloud thing, and that will all be important at some point, but it's impractical and generally considered bad practice to be testing code on our external server. What we should do is develop on internal local servers, then upload it all to the external server once it is complete.

## 3. Our database so far
This section will talk about how we decided to design the database, some changes I made upon realizing some problems with or design, and how you can set up the database on your internal server. Unfortunately I don't see a way that I can push a database to GitHub such that we could keep all of ours in sync, so instead we all have to set ours up individually. Luckily, setting up the database is a simple as copy/pasting commands, but if we make any changes to this database in the future, we will have to all make the changes manually and individually.

#### Setting up MySQL
The good news is that XAMPP comes with MariaDB (MySQL) already installed on it, so you don't have to do anything with regards to installation. Make sure your server is running, and Apache and MySQL are running on your XAMPP control panel.

Before you try to log in, open your web browser and go to your server home page by typing "localhost" in the address bar. You should see the XAMPP home page, click on phpMyAdmin in the top right corner. If the phpMyAdmin interface pops up, then congratulations, your mySQL works. If you get a bunch of red boxes with errors, it's likely that the MySQL port on your server (3306) is blocked by some other application (I had this problem). If you get this problem, you can try and stack overflow how to change the MySQL port on an XAMPP server, or you can reach out to me because I had to deal with this problem.

Once you know that MySQL works, go to XAMPP control panel and click "Shell". This will bring up a command line.

To get into MySQL:

    mysql -u root

#### Creating the Database

First create the database (I called it "Website"), and then enter the "use" command to access it:

    create database Website;
    use Website;

You are now in the database, which is currently empty. In class we created the database schema, and the following script is the code to implement that schema. Copy and paste this line by line, hitting enter after each line. I'm pretty sure there are no syntax errors in here but definitely let me know if you run into one.

    create table user(
        user_id varchar(25) NOT NULL,
        password varchar(25) NOT NULL,
        PRIMARY KEY (user_id)
        );

    create table post(
        post_id int NOT NULL AUTO_INCREMENT,
        poster_id varchar(25),
        text varchar(250) NOT NULL,
        time datetime NOT NULL,
        FOREIGN KEY(poster_id) REFERENCES user(user_id)
        PRIMARY KEY(post_id)
        );

You may want to populate the database with users if you want to test PHP programs. Here are the commands to add entries to the tables:

###### User
    INSERT INTO user(user_id, password) VALUES('your_id_here', 'your_password');
What you are telling the database here is that you want to make a new entry in the "user" table, and you want to give this user a "user_id" and a "password" attribute. The VALUES function then specifies what you want those attributes to be. Remember that when entering any string variable into the database it has to be in quotes, otherwise you will get a syntax error.

###### Post
    INSERT INTO post(poster_id, text, time) VALUES('your_id_here', 'your text here', now());

Notice that the "post_id" field is absent here. That is because MySQL will assign the post an ID automatically. Also, the now() function simply returns the date and time the function was executed. Also don't try to attribute a post to a user that you haven't created yet, that won't work for obvious reasons.

#### Changes I Made
I added a DATETIME attribute to the post table so that we will be able to order our posts chronologically on our website. I also made the primary key of post such that it is only a post ID, as opposed to a composite key of the post_id and poster_id. I also made it so a post does not need to have a user associated with it. I am not sure if this change will stick, but I will explain why I made it in the next section.

## 4. The anon problem
This isn't really a problem as much as it is a design decision that we have to make. We currently decided that our website would have users but wouldn't require the user to sign in to post, aka they could post as an anonymous user. The big design question here is whether we should make "anonymous" itself an account linked to all of the anonymous posts, or if we should simply label any post without a user as anonymous. I currently lean towards the latter, which is why I made the database such that a post doesn't need to have a poster_id, and removed poster_id from post's primary key. This is an easy thing to change later if we find a reason why we might want to do things the other way.

## 5. HTTP Requests and Retrieving Data from the Database

This program displays a button, which will retrieve a single entry from the database and display it to the screen when pushed. I purposely made it basic to make it more clear what's going on.

    <!DOCTYPE HTML>
    <html>

    <head>


    </head>

    <body>
      <?php
      if(isset($_POST['retrieve']) {
             retrieve();
         }

        function retrieve(){
          $con = mysqli_connect("localhost", "root", "", "Website");

          $retrive_query = "SELECT * FROM post";
          $result = mysqli_query($con, $retrive_query);
          $row = mysqli_fetch_assoc($result);
          echo $row['poster_id'], "    ", $row['text'];
        }


       ?>

       <form method = 'post'>
        <input type="submit" name="retrieve" value="Retrieve" />
      </form>
    </body>

    </html>


First look at the form at the bottom of this code. The form's method is 'post', meaning it will create a POST request to the server when it is clicked. POST is a HTTP request, and it is what we use to build a bridge between the client and the server.

Now look at the first section of php code. This says to run the function retrieve() when there is a POST request from 'retrieve'.

Here's a copy/paste from my prior research doc about how the function retrieve() works:

1.	First, connect to the database we want to be looking at with mysqli_connect(). We will then store this link in the variable $con. The four arguments are:

  1.	Server the database is hosted on. With any example we will be working with, the database will be on the same server that we are working with, therefore we put in the parameter “localhost” to indicate this.

  2.	Username you want to access the database with. I accessed it with the “root” user, but in the future when we create different users for our database, this will change.

  3.	Password for the user. In this case it is blank because I didn’t set a password.

	4. The name of the database we want

2.	Next, write the query we want to perform. In this case I wanted to get everything from the “post” table.

3.	Perform the query with the function mysqli_query(), which returns a MySQL query object which I stored in $result. The arguments are:

	 1. Database we are looking at, which we called $con

	 2. The query we wanted to perform, which we called $sql.

4. mysqli_fetch_assoc will turn your query result into an array.

5.	echo echo $row['poster_id'], " ", $row['text']; prints the result of the query to the screen

Here is a more complete program which does essentially the same thing. This time it handles the case where it can't connect to the database, checks to make sure there are items in the table, and can print multiple query results.

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
    </body>

    </html>

This time if we can't connect to the server or the database, the program will print 'Unable to connect' and then program will stop. Additionally, if there are multiple query results it will print all of them sequentially.

## 6. Sending data to the database

Here is the code for sending data to the database. When the 'Send' button is pushed, a row will be sent to the database with the poster_id, text, and the time which the query was made.

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

        $send_query = "INSERT INTO post(poster_id, text, time) VALUES ('$user_id', '$text', now());";

        $result = mysqli_query($con, $send_query);
        echo $result;
    }


    ?>

This time when the send button is pressed, a post request will be made with the contents inside the form. We access the contents of the request with:

    $user_id = $_POST['user_id'];
    $text = $_POST['text'];

The process of querying the database is the same as in previous examples.
