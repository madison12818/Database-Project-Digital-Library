<!DOCTYPE html>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require("dbConnect.php");

    if(!get_magic_quotes_gpc()) {
        $uname = addslashes($_POST['uname']);
        $psw = $_POST['psw'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
    } else {
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
    }
	#insert into customer values("ADMIN","ADMIN@bitbook.com","Smith Hall","ADMIN","ADMIN","password");
	$sql = "insert into customer values('$uname','$email','$address','$fname','$lname','$psw');";	
	echo $sql;
	$retval = mysqli_query($conn,$sql);
	
	if(! $retval ) {
        die('Could not enter data: ' . mysqli_error($conn));
    }
	
	mysqli_close($conn);
	
	setcookie("user",$uname, time() + (3600), "/");
	
	echo $retval;

ob_start();
header('Location: feed.html');
ob_end_flush();
die();

?>

<html>

    <link rel="stylesheet" href="BitBook.css">
<header>
    <div class="topnav" >
        <img src="https://st2.depositphotos.com/1069290/5358/v/950/depositphotos_53581759-stock-illustration-book-icon-vector-logo.jpg">
        <a href="landing.html">Home</a>
        <a href="login.html">Login</a>
        <a class="active" href="register.html">Register</a>
    </div>
</header>

<body>
<div>
</div>
</body>
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
