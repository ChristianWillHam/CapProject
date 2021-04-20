# Component Descriptions

### index.php
The homepage file of our project, includes header.php and formfeed.php which are the two main sections for the frontend.

### header.php
Includes the header with links to login, sign up and logout. If the user isn't logged in, the header will display login and sign up links, if they logged in it will display the logged in username and the logout link.

### formfeed.php
Contains the form for post submission and includes feed.php, the code responsible for displaying the feed.

### feed.php
This form loops through all of the posts in the database and displays them to the screen with the correct formatting. If a post has a user associated with it, that username is displayed, if not the post is associated with "Anonymous".

### login.php
The form to log into an account

### signup.php
The form to create an account

### dbh.inc.php
The database handler, any file that includes this file will have access to the $connect variable, which is where the database connection is stored

### login.inc.php
The script to log in the user. Calls functions to check if the user filled in all fields, then calls a function to try to log the user in .

### signup.inc.php
The script to create an account for the user. Checks that all fields are filled in, passwords match, the username is valid, and that the username doesn't already exist. If all of these conditions pass, the user is signed in.

### logout.inc.php
Logs out the user.

### postform.inc.php
Handles posts by the user by sending information from the post form to the database.

### functions.inc.php

##### emptyInputSignup($username, $pwd, $pwdRepeat)
Returns true if any of these three fields are blank.

##### invalidUID($username)
Returns true if the username contains an invalid character.

##### pwdMatch($pwd, $pwdRepeat)
Returns true if the two fields are not equivalent to each other.

##### function uidExists($connect, $username)
If the username is found in the database, it returns the row associated with that username. If the username is not found it returns false.

##### function createUser($connect, $user_id, $pwd)
Inserts a user row into the database with the given parameters $user_id and $pwd. It will also log in the user to the account just created, and send them to the homepage.

##### function emptyInputLogin($username, $password)
Returns true if either field is blank

##### function loginUser($connect, $user_id, $pwd)
Uses uidExists to ensure that the account being logged in exists, if it does it logs in the user and returns them to the home page.  

# Additional notes

### Script to create the database
  Our code assumes that the database is named "website" and is running on localhost.

    create table user(
        user_id varchar(25) NOT NULL,
        password varchar(128) NOT NULL,
        PRIMARY KEY (user_id)
        );

    create table post(
        post_id int NOT NULL AUTO_INCREMENT,
        poster_id varchar(25),
        text varchar(250) NOT NULL,
        time datetime NOT NULL,
        FOREIGN KEY(poster_id) REFERENCES user(user_id),
        PRIMARY KEY(post_id)
        );

### Session Variables
The name of the user signed in is stored in the global session variable $_SESSION['user_id']. This variable is null if no user is signed in. 
