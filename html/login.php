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
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
 
//If we retrieved a relevant record.
if ($userRow !== false){
    //Compare the password attempt with the password we have stored.
    $validPassword = password_verify($password, $userRow['password']);
    if ($validPassword){
        //All is good. Log the user in.
        echo "Password was correct!";
        $_SESSION['user'] = $userRow['username'];
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['user_role'] = $userRow['user_role'];
        if ($userRow['user_role'] === 'librarian') {
            header('location: librarian.php');
        } else {
            header('location: cardowner.php');
        }
    } else {
        echo "Bad username / password; try again";
    }
} else {
    echo "Bad username / password; try again";
}  

?>
