<?php
//session_start();

include 'accesscontrol.php';

$sellISBN = $sellBookName = $sellprice = "";

if (isset($_POST['isbn'])) {
    $sellISBN = $_POST['isbn'];
}

if (isset($_POST['bookName'])) {
    $sellBookName = $_POST['bookName'];
}

if (isset($_POST['bookPrice'])) {
    $sellPrice = $_POST['bookPrice'];
}

insertToSell($sellISBN, $sellBookName, $sellPrice);


function insertToSell($sellISBN, $sellBookName, $sellPrice)
{
    //mySQL parameters
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "bookBarter";
    
    //set the connection
    $dbConnection = mysqli_connect($server, $username, $password, $database);
    
    $sqlStmt = "INSERT INTO sellBooks(sellISBN,sellBookName,sellprice,sellstudent_id)
VALUES('" . $sellISBN . "', '" . $sellBookName . "', '" . $sellPrice . "', '" . $_SESSION['studentID'] . "')";
    
    
    if (mysqli_query($dbConnection, $sqlStmt)) {
        echo "Book Added to your listing";
    } else {
        echo "Error adding book. Try Again!";
    }
    mysqli_close($dbConnection);
}
?>