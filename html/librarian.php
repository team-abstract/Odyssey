<?php 
include('auth.php');

// redirect if NOT a librarian
if (isset($_SESSION["user"])) {
    if ($_SESSION['user_role'] !== 'Librarian') {
        header('location: cardowner.php');
    }
}

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

	<h1><center>Hello 
	<?php $name = $_SESSION['user'];
	echo $name;
	?>
	!</center></h1>
        <br><br><br><br>
        <h1><center> <img src="./odyssey_logo.png" style="height:100px;"> </center></h1>
        <div class="search-bar">
            <form action="/search.php" method="post">
                <input type="text" placeholder="Search for a title" name="search">
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
            <br>
            <br>
        </div>

        <div class="find-cardowner">
            <form action="/getcardowner.php" method="post">
                <input type="text" placeholder="First Name" name="fname">
                <input type="text" placeholder="Last Name" name="lname">
                <input type="text" placeholder="Phone number (Optional)" name="phone">
                <button type="submit">Find Card Owner</button>
            </form>
        </div>
        </body>
    </div>
</body>
</html>
