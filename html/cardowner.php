<?php 
include('auth.php');
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Odyssey Library Homepage</title>
    <link rel="stylesheet" type="text/css" href="tmpstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function showadv() {
            // toggle visibility of advanced search elements
            if (document.getElementById("advoptions").style.visibility == "visible") {
                console.log("[+] hiding options");
                document.getElementById("advoptions").style.visibility = "hidden";
            } else {
                console.log("[+] making visible");
                document.getElementById("advoptions").style.visibility = "visible";
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <h2>Search the Odyssey Library Collection</h2>
    </div>
    <div class="content">
        <!-- logged in user information -->
        <body>
        <div class="topnav">
            <a class="active" href="#home">Home</a>
            <div class="login-container">
                    <form action="cardowner.php" method="get">
                        <button type="submit" name="logout" value="1">Log Out</button>
                    </form>
                </div>
        </div>
        <br><br><br><br>
        <br><br><br><br>
        <h1><center> <img src="./odyssey_logo.png" style="height:100px;"> </center></h1>
        <div class="search-bar">
            <form action="/search.php" method="post">
                <input type="text" placeholder="Search for a title" name="title">
                <button type="submit"><i class="fa fa-search"></i></button>
            <button onclick="showadv();" type="button">Advanced Search</button>
            <br>
            <div id="advoptions">
		    <input type="text" placeholder="Author" name="author">
		    <input type="text" placeholder="ISBN" name="isbn">
		    <input type="text" placeholder="Publication Year" name="pubyear">
		    <input type="text" placeholder="Publisher" name="publisher">
		    <input type="text" placeholder="Item Type" name="itemtype">
		    <input type="text" placeholder="Genre" name="genre">
            </div>
            </form>
        </div>

        <?php
	    echo $_SESSION['user'] . "<br>";
	    //echo $_SESSION['userid'];
	    $userq = $_SESSION['userid'];
	    $query = "SELECT itemOnHoldID, outstandingFees FROM cardOwners WHERE userID = :user";
	    $dbobj = $pdo->prepare($query);
	    $dbobj->bindValue(':user', $userq);
	    $dbobj->execute();
	    // view books on hold, checkedout, fees
	    // TODO: pretty print in HTML
	    $sqlarray = $dbobj->fetch(PDO::FETCH_ASSOC);
	    print("items on hold: " . $sqlarray[itemOnHoldID] . "<br>");
	    print("outstanding fees: " . $sqlarray[outstandingFees] . "<br>");

            $chkBooksQuery = "SELECT title FROM items WHERE bibnum=(SELECT bibnum FROM checkedBooks WHERE cardOwnerID=(SELECT cardOwnerID FROM cardOwners WHERE userID=:user))";
	    $chkBooksDBobj = $pdo->prepare($chkBooksQuery);
            $chkBooksDBobj->bindValue(':user', $userq);
            $chkBooksDBobj->execute();
            print("checked books: ");
            print_r($chkBooksDBobj->fetchAll());
        ?>
        </body>

    </div>
</body>
</html>
