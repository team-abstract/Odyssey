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
    print_r($qoutput);

    $cardOwnerID = $qoutput[0][cardOwnerID];
    $isSuspended = $qoutput[0][isSuspended];
    $userID = $qoutput[0][userID];

?>

<!DOCTYPE html>
<html>
<body>
    <form action="updateCardOwner.php" method="post">
        <input type="text" placeholder="Email" name="email">
        <input type="text" placeholder="First Name" name="fname">
        <input type="text" placeholder="Last Name" name="lname">
        <input type="text" placeholder="Phone Number" name="phoneNum">
        <input type="hidden" name="userID" value=<?php print($userID); ?>>
        <button type="submit">Update Card Owner Info</button>
    </form>

    <form action="switchCardOwnerStatus.php" method="get">
        <input type="hidden" name="cardOwnerID" value=<?php print($qoutput[0][cardOwnerID]); ?> >
        <input type="hidden" name="isSuspended" value=<?php print($isSuspended); ?> >
        <button type="submit">Toggle Card Owner Status </button>
    </form>

    <form action="checkOutBook.php" method="post">
        <input type="text" placeholder="cardOwnerID" name="cardOwnerID" value=<?php print($cardOwnerID); ?>>
        <input type="text" placeholder="bibnum" name="bibnum">
        <button type="submit">Check out a book</button>
    </form>

</body>
</html>
