<!DOCTYPE html>
<html> 
    <link rel="stylesheet" href="BitBook.css">
<header>
    <div class="topnav" >
        <img src="https://st2.depositphotos.com/1069290/5358/v/950/depositphotos_53581759-stock-illustration-book-icon-vector-logo.jpg">
        <a href="feed.html">Books For You</a>
        <form class="example" action="search.php" style="height: 42px;">
            <button type="submit" style="margin-left:0px;">Search</button>
            <input type="text" placeholder="Search.." name="search">
        </form>
    </div>
</header>

<body>

   <?php

  if($_GET) {
//  echo "HEY";
      if(isset($_GET['book'])) {

          order($_GET['book']);
      }
  }

  function order($book) {

  $book = str_replace("+"," ",$book);

//  echo "IN FUNCTION with book: " . $book;
  require("dbConnect.php");
  if(isset($_COOKIE["user"])) {

      $sql = "select isbn from book where title = '" . str_replace("'","\'",urldecode($book)) . "';";

      $isbn = mysqli_query($conn,$sql);

      if(! $isbn) {die('Could not enter data: ' . mysqli_error($conn));}

  //    echo gettype($isbn);
      $isbn = $isbn->fetch_row();
      $time = date('Y-m-d G:i:s');

      $sql = "insert into ordered values('$time','".$_COOKIE["user"]."',$isbn[0],0);";
           


      echo '<div class="contentsBook" style="margin-top: 5%; text-align:center;">';
      echo '<p style="color:white; font-size: 25px;">You have successfully ordered :';
      echo '<br>';
      echo  urldecode($book);
      echo '</p>';
      echo '<p style="color:white; font-size: 25px;">Feel free to look for more books while you wait for your book to arrive!';
      echo '</p>';
      echo '<br>';
      echo '</p>';
      echo '<p style="color:white; font-size: 25px;">Thank you for using BitBook!';
      echo '</p>';
      echo '</div>';
      //echo $sql;
      $retval = mysqli_query($conn,$sql);
      
      if(! $retval) {die('Could not enter data: ' . mysqli_error($conn));}

      mysqli_close($conn);
  }
  else {
      echo "You aren't logged in!";
  }
  }
?>

</body> 
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

