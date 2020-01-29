<!DOCTYPE html>

<?php
require("dbConnect.php");

if(!get_magic_quotes_gpc()) {
	$uname = $_POST['uname'];
	$psw = $_POST['psw'];
}
else {
	$uname = $_POST['uname'];
	$psw = $_POST['psw'];
}

$sql = "select password from customer where username = '$uname';";
#echo $sql;
$retval = mysqli_query($conn,$sql);

if(! $retval) {
	die('Could not enter data: ' . mysqli_error($conn));
}
mysqli_close($conn);
$row = $retval->fetch_assoc();
if($row['password'] == $psw) {
    setcookie("user",$uname, time() + (3600), "/");
    ob_start();
    header('Location: feed.html');
    ob_end_flush();
    die();
}
else {
	echo "INVALID LOGIN";
}

if(!isset($_COOKIE["user"])) {
    echo "NO user <br>";
}
else {
    echo "Hello, " . $_COOKIE['user'];
}



?>


<html> 
    <link rel="stylesheet" href="BitBook.css">
<header>
    <div class="topnav" >
        <img src="https://st2.depositphotos.com/1069290/5358/v/950/depositphotos_53581759-stock-illustration-book-icon-vector-logo.jpg">
        <a href="landing.html">Home</a>
        <a class="active" href="login.html">Login</a>
        <a href="register.html">Register</a>
    </div>
</header>

<body>
    <div id="contents">
        <div id="partTwo"><h2>WE'D LIKE TO FORMALLY<br><b>WELCOME<br></b>YOU BACK.</h2></div>
        <div id="middle"></div>
        <div id="loginBox">
            <form id="loginBoxForm">
                <h1 style="color:white">Please Login Here</h1>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required=""><br>
                
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required=""><br>
                    
                <button type="submit">Login</button>
            </form>
        </div>
		
		
		
    </div>
</body> 
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
