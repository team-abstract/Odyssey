<?php

include('auth.php');

require("db_connect.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];

$fname = "%$fname%";
$lname = "%$lname%";
$phone = "%$phone%";

$query = "SELECT * FROM cardOwners WHERE userid=(SELECT id FROM users WHERE firstName LIKE :fname AND lastName LIKE :lname AND phoneNum LIKE :phone )";

$dbobj = $pdo->prepare($query);

$dbobj->bindValue(':fname', $fname);
$dbobj->bindValue(':lname', $lname);
$dbobj->bindValue(':phone', $phone, PDO::PARAM_INT);

$dbobj->execute();

$qoutput = $dbobj->fetchAll();
print_r($qoutput);

?>
