<?php

include('auth.php');

require("db_connect.php");

$search = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$pubyear = $_POST['pubyear'];
$publisher = $_POST['publisher'];
$itemtype = $_POST['itemtype'];
$genre = $_POST['genre'];

$search = "%$search%";

$sql = "SELECT * FROM items WHERE title LIKE :title";

if(empty($_POST['title'])) { echo "Please enter a title." . "<br>"; }
if(!empty($_POST['author'])) { $sql = $sql . " AND author LIKE :author"; }
if(!empty($_POST['isbn'])) { $sql = $sql . " AND isbn=:isbn"; }
if(!empty($_POST['pubyear'])) { $sql = $sql . " AND publicationYear=:pubyear"; }
if(!empty($_POST['publisher'])) { $sql = $sql . " AND publisher LIKE :publisher"; }
if(!empty($_POST['itemtype'])) { $sql = $sql . " AND itemtype=:itemtype"; }
if(!empty($_POST['genre'])) { $sql = $sql . " AND genre=:genre"; }

$stmt = $pdo->prepare($sql);

if(!empty($_POST['title'])) { $stmt->bindValue(':title', $search); }
if(!empty($_POST['author'])) { $stmt->bindValue(':author', $author); }
if(!empty($_POST['isbn'])) { $stmt->bindValue(':isbn', $isbn); }
if(!empty($_POST['pubyear'])) { $stmt->bindValue(':pubyear', $pubyear, PDO::PARAM_INT); }
if(!empty($_POST['publisher'])) { $stmt->bindValue(':publisher', $publisher); }
if(!empty($_POST['itemtype'])) { $stmt->bindValue(':itemtype', $itemtype); }
if(!empty($_POST['genre'])) { $stmt->bindValue(':genre', $genre); }

$stmt->execute();

$sqlRow = $stmt->fetchAll();

print_r($sqlRow);
//print_r($sql);

echo $search . "<br>";
echo $isbn . "<br>";
echo $pubyear . "<br>";
echo $publisher . "<br>";

/*
for ($i = 0; $i < count($sqlRow); $i++) {
    echo $sqlRow[$i] . "\n";
}*/

?>