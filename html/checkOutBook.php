<?php

    include('auth.php');

    require("db_connect.php");

    $cardOwnerID = $_POST['cardOwnerID'];
    $bibnum = $_POST['bibnum'];

    $query = "INSERT INTO checkedBooks (cardOwnerID, bibnum) VALUES (:cardOwnerID, :bibnum)";
    $dbobj = $pdo->prepare($query);
    $dbobj->bindValue(':cardOwnerID', $cardOwnerID);
    $dbobj->bindValue(':bibnum', $bibnum);
    $dbobj->execute();

    echo "[+] Checked out book " . $bibnum;

?>
