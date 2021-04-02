<?php

// Function in order to handle mis-filed login forms
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){

    //Declairing $result; to minimize work
    $result;

    if((empty)($name) || if(empty)($email) || if(empty)($username) || if(empty)($pwd) || if(empty)($pwdRepeat)) {
            $result = false;
    } else {
            $result = true;
    }

    return $result;
}

// Function to check if user ID is valid using preg_match
function invalidUID($username){

    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $result)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to check if an email is valid
function invalidEmail($email) {

    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to test if a pssword is correct
function pwdMatch($pwd, $pwdRepeat) {

    $result;

    if($pwd !== $pwdRepeat){
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to search if a username is in the database
function uidExists($conn, $username, $email){
    // Question mark AS placeholder for data

    // Note: This is in order to prevent invalid inputs 
    // of code from changing the backend in the frontend
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_statement_prepares($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = (mysqli_fetch_assoc($resultData))){
        // Section is empty because later in the program I 
        // will need to fetch and compare from username
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser(){

    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (? , ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    // If above action does not fail
    if(!mysqli_statement_prepares($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    // Super weak security at this point makes all accounts on the
    // platform extremely vulnerable to attack
    // probably will hash here default php hash is updated regularly

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // Return the user to somewhere
    header(location: ../signup.php?error=none);
    exit();
}

/*
----------------------------------> COMMENT BY CHRISTIAN:
----------------------------------> Do we want this at this point in the project?
----------------------------------> Just shoot me a text and ill finish. I can write more php whenever,
----------------------------------> I have a pretty decent grasp now.
function emptyInputLogin(){

}

function loginUser(){
  
}
*/