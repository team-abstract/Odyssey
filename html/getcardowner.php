<?php

    include('auth.php');

    require("db_connect.php");

    print_r($qoutput);

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

    /*
    print_r($qoutput);

    foreach ($qoutput[0] as $q) {
        echo $q . "<br>";
    }
    */

    $cardOwnerID = $qoutput[0][cardOwnerID];
    $itemOnHoldID = $qoutput[0][itemOnHoldID];
    $outstandingFees = $qoutput[0][outstandingFees];
    $isSuspended = $qoutput[0][isSuspended];
    $userID = $qoutput[0][userID];

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

    form {
        padding: 10px;
    }

    input {
        display: block;
    }

    button {
        display: block;
    }

    #userinfo {
        margin-bottom: 15px;
        padding: 4px 12px;
    }

    .info {
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }

</style>
<body>
    <br><br>
    <br><br>

    <div class="w3-container" align=center>

    <div class="w3-card-4" style="width: 300px;">
        <p class="w3-container w3-blue">
            Card Owner ID: <?php print($cardOwnerID); ?>
            <br>
            User ID: <?php print($userID); ?>
        </p>

    <div id="userinfo" class="info">
       Item On Hold ID: <?php print($itemOnHoldID) . "<br>"; ?> 
       Outstanding Fees: <?php print($outstandingFees) . "<br>"; ?>
       Suspended Status: <?php print($isSuspended) . "<br>"; ?>
    </div>

    <form class="w3-container" action="switchCardOwnerStatus.php" method="get">
        <input type="hidden" name="cardOwnerID" value=<?php print($qoutput[0][cardOwnerID]); ?> >
        <input type="hidden" name="isSuspended" value=<?php print($isSuspended); ?> >
        <button type="submit">Toggle Card Owner Status </button>
    </form>

    <br>

    <form class="w3-container" action="updateCardOwner.php" method="post">
        <input type="text" placeholder="Email" name="email">
        <input type="text" placeholder="First Name" name="fname">
        <input type="text" placeholder="Last Name" name="lname">
        <input type="text" placeholder="Phone Number" name="phoneNum">
        <input type="hidden" name="userID" value=<?php print($userID); ?>>
        <button type="submit">Update Card Owner Info</button>
    </form>

    <br>

    <form class="w3-container" action="checkOutBook.php" method="post">
        <input type="text" placeholder="cardOwnerID" name="cardOwnerID" value=<?php print($cardOwnerID); ?>>
        <input type="text" placeholder="bibnum" name="bibnum">
        <button type="submit">Check out a book</button>
    </form>

    <br>

    </div>

</body>
</html>
