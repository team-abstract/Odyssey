<?php 
include('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Odyssey Library Homepage</title>
    <link rel="stylesheet" type="text/css" href="tmpstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <h1><center>Welcome!</center></h1>
        <div class="search-bar">
            <form action="/search.php" method="post">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        </body>

    </div>
</body>
</html>
