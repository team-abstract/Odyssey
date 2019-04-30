<?php

    include('auth.php');

    require("db_connect.php");

    $cardOwnerID = $_GET['cardOwnerID'];
    $isSuspended = $_GET['isSuspended'];

    if ($isSuspended === "Y") {
        $isSuspended = "N"; 
    } else {
        $isSuspended = "Y";
    }

    $query = "UPDATE cardOwners SET isSuspended=:isSuspended WHERE cardOwnerID=:cardOwnerID";

    $dbobj = $pdo->prepare($query);

    $dbobj->bindValue(':isSuspended', $isSuspended);
    $dbobj->bindValue(':cardOwnerID', $cardOwnerID);

    $dbobj->execute();

    $qoutput = $dbobj->fetchAll();
    print_r($qoutput);

?>
