<?php

// init session
session_start();

// redirect if already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: odyssey.php");
    exit;
}

require_once "db_connect.php";

//The form values that the user has supplied us with.
$username = $_POST['username'];
$password = $_POST['password'];
 
//Retrieve the table row for the given username.
$sql = "SELECT id, username, password FROM users WHERE username = :username";

//Prepare your statement.
$stmt = $pdo->prepare($sql);
    
//Bind the username value.
$stmt->bindValue(':username', $username);
    
//Execute the statement.
$stmt->execute();
    
//Fetch the table row.
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
//If we retrieved a relevant record.
if($user !== false){
    //Compare the password attempt with the password we have stored.
    $validPassword = password_verify($password, $user['password']);
    if($validPassword){
        //All is good. Log the user in.
        echo "Password was correct!";
    }
} else {
    echo "Password was BAD";
}  

?>
