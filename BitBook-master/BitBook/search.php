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
      
    function get_books($term) {

      require("dbConnect.php");

        $output = shell_exec("python3.8 ../BitBook\ Backend/search.py $term");

        if($output == "{}\n") {
          echo '<h1> Sorry! </h1>';
          echo '<p> We were unable to find any books with those criteria, please try again </p>';
          die();
        }
        $array = json_decode($output, true);
        foreach ($array as $book){ 
            echo '<div class="contentsBook" style="margin-top: 5%;">';
            echo '<div class="info" style="text-align: left; sans-serif; color: black; background-color:#2B7A78; border: 2px solid black; width: 45%; margin: auto;">';
            echo '<div class="topPart">';
            echo '<div class="cover" style="margin: 25px; width: 45%; display:inline-block; vertical-align: top;">';
            echo  '<img src="' . $book["cover"] . '" alt="Cover Photo Did Not Load!" height="55%" width="45%;" float: right;>';
            echo '</div>';
            echo '<div class="description" style="margin: 25px; display:inline-block;">';
            echo '<p id="title">Title: ';
            echo $book['title'];
            echo '</p>';
            $sql = "select author.fname, author.lName from book natural join wrote natural join author where book.ISBN = " . $book["isbn"];
            $author = mysqli_query($conn,$sql);
            if($author) {
              $author = $author->fetch_row();
              echo '<p id="author"> Author: ' . $author[0] . " " . $author[1] . "</p>";
            }
	    echo '<form action="order.php" method="get">';
	    echo '<button type="submit" name="book" value = ' . $book["isbn"] . '>Purchase</button></form>';

            echo '</div>';
            echo '<div class="bottomPart" style="margin: 25px;">';
            echo '<p id="summary">Summary: ';
            echo $book['summary'];
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    if(isset($_GET['search'])) {
        get_books($_GET['search']);
    }
    ?>

</body> 
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
