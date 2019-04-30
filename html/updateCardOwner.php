<?php

    include('auth.php');

    require("db_connect.php");

    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phoneNum = $_POST['phoneNum'];

    if (!empty($email)) {
        echo "[+] Updating email";
	$query = "UPDATE users SET email=:email WHERE id=:userID";
	$dbobj = $pdo->prepare($query);
	$dbobj->bindValue(':email', $email);
	$dbobj->bindValue(':userID', $userID);
	$dbobj->execute();
    }
    if (!empty($fname)) {
	echo "[+] Updating first name";
	$query = "UPDATE users SET firstName=:fname WHERE id=:userID";
	$dbobj = $pdo->prepare($query);
	$dbobj->bindValue(':fname', $fname);
	$dbobj->bindValue(':userID', $userID);
	$dbobj->execute();
    }
    if (!empty($lname)) {
	echo "[+] Updating last name";
	$query = "UPDATE users SET lastName=:lname WHERE id=:userID";
	$dbobj = $pdo->prepare($query);
	$dbobj->bindValue(':lname', $lname);
	$dbobj->bindValue(':userID', $userID);
	$dbobj->execute();
    }
    if (!empty($phoneNum)) {
	echo "[+] Updating phone number";
	$query = "UPDATE users SET phoneNum=:phoneNum WHERE id=:userID";
	$dbobj = $pdo->prepare($query);
	$dbobj->bindValue(':phoneNum', $phoneNum);
	$dbobj->bindValue(':userID', $userID);
	$dbobj->execute();
    }

    echo "[+] Finished updating cardowner information";

?>
