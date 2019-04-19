<?php
session_start();

echo'postloginpage';
echo $_SESSION['email'];
echo $_SESSION['password'];
?>