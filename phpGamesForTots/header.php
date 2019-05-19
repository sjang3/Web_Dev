<!DOCTYPE html> <!-- HTML5 Doctype -->
<html lang="en-US" />

<head>
    <title>
        <?php if(isset($title)){ echo $title;} ?>
        GamesForTots
    </title>
    <meta charset="utf-8" /> <!-- HTML5 Encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css"> <!-- Link to Main CSS -->

</head>

<style>
    .navbar {
        overflow: hidden;
        /* hides overflow */
        background-color: #333;
    }

    .navbar a {
        float: left;
        /* causes links to stay side-by-side */
        display: block;
        /* makes the display block so you can hover */
        color: white;
        text-align: center;
        /* centers the text */
        padding: 14px 20px;
        /* makes spaces between words */
        text-decoration: none;
        /* removes the underline */
    }

    /* makes links designated as right float to the right of the page */
    .navbar a.right {
        float: right;
    }

    /* makes it so it changes on hover */
    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

</style>

<body>
    <div class="header">
        <a href="index.php">
                <img src="images/gamesfortotslogo.png" alt="HTML tutorial">
            </a>
    </div>

    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="aboutUs.php">About Us</a>
        <a href="contactUs.php">Contact Us</a>
        <!--<a href="registration.php" class="right">Log-Out</a>" -->
        <a href="login.php" class="right">Login</a>
        <a href="registration.php" class="right">Register</a>

    </div>

</body>
