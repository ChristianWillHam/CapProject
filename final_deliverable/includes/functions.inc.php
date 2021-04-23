<?php

// Returns true if any of these fields are blank
function emptyInputSignup($username, $pwd, $pwdRepeat){

    $result;

    if(empty($username) || empty($pwd) || empty($pwdRepeat)) {
            $result = true;
    } else {
            $result = false;
    }

    return $result;
}

// Function to check if user ID is valid using preg_match
function invalidUID($username){

    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
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
function uidExists($connect, $username){
    // Question mark AS placeholder for data

    // Note: This is in order to prevent invalid inputs
    // of code from changing the backend in the frontend
    $sql = "SELECT * FROM user WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);


//If the user was found, return the row from the database. If they weren't return false
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = (mysqli_fetch_assoc($resultData))){
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($connect, $user_id, $pwd){

    $sql = "INSERT INTO user (user_id, password) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($connect);
    // If above action does not fail
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    // Hash the password, so we are not saving raw passwords in the database
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $user_id, $hashedPwd);
    if(mysqli_stmt_execute($stmt)){
    } else {
      header("location: ../signup.php?error=databaseInsertFail");
    }
    mysqli_stmt_close($stmt);
    // Return the user to somewhere
    loginUser($connect, $user_id, $pwd);
    exit();
}

//same as the above emptyinput, but for the login form
function emptyInputLogin($username, $password){
  $result;

  if (empty($username) || empty($password)){
    $result = true;
  } else {
    $result = false;
  }

  return $result;
}

//Logs in the user, or returns an error if the login failed
function loginUser($connect, $user_id, $pwd){
  $uidExists = uidExists($connect, $user_id);

//uidExists returns the row in the database if the user is found
  if($uidExists === false){
    header("location: ../login.php?error=loginFailedUID");
  } else{

//Unhash the password
    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

//Check if the password is correct.
    if($checkPwd === false){
      header("location: ../login.php?error=loginFailedPass");
    } else if ($checkPwd === true){
      //The name of the logged in user is contained in the SESSION variable below
        session_start();
        $_SESSION["user_id"] = $uidExists["user_id"];
        header("location: ../index.php");
        exit();
    }
  }
}
