<?php
session_start();

// Database connection ("localhost","username","password","database_name")
$host = "localhost";
$username = "root";
$password = "";
$db_name = "erpshipping";
// Local connection
$con = mysqli_connect($host,$username,$password,$db_name);
// $con = mysqli_connect('localhost','root','Tatwa@2022','foodcrm');

// Tatwa connection
// $con = mysqli_connect('localhost','admin22','p@ssw0rd#2022','CRM');



?>