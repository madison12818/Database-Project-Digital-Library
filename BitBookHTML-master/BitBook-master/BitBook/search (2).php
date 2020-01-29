<!DOCTYPE html>
<html> 
    <link rel="stylesheet" href="BitBook.css">
<header>
    <div class="topnav" >
        <img src="https://st2.depositphotos.com/1069290/5358/v/950/depositphotos_53581759-stock-illustration-book-icon-vector-logo.jpg">
        <a href="landing.html">Home</a>
        <a href="feed.html">Books For You</a>
        <form class="example" action="search.php" style="padding-block: 15px;">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
    </div>
</header>

<body>
    <!-- <div id="contentsBook">
        <div id="info">
            <div id="topPart">
                <div id="cover">
                        <img src="https://render.fineartamerica.com/images/rendered/default/poster/8/10/break/images-medium-5/sherlock-holmes-book-cover-poster-art-2-nishanth-gopinathan.jpg" alt="Cover Photo Did Not Load!">
                </div> 
                <div id="description">
                    <p id="title">Title: </p> 
                     <p id="author">Author: </p>
                    <button type="button" style="margin: 0px;">Purchase</button>
                </div>
            </div>
            <div id="bottomPart">
                <p id="summary">Summary: </p>
            </div>
        </div>
    </div> -->


    <?php
    // header("Content-type: text/css");
    function get_books($term) {
        $output = shell_exec("python3.8 ../BitBook\ Backend/search.py $term");
        // echo $output;
        $array = json_decode($output, true);
        foreach ($array as $book){ 
            echo '<div class="contentsBook" style="margin-top: 5%;">';
            echo '<div class="info" style="text-align: left; sans-serif; color: black; background-color:#2B7A78; border: 2px solid black; width: 45%; height: 500px; margin: auto;">';
            echo '<div class="topPart">';
            echo '<div class="cover" style="margin: 25px; width: 45%; display:inline-block; vertical-align: top;">';
            echo  '<img src="https://render.fineartamerica.com/images/rendered/default/poster/8/10/break/images-medium-5/sherlock-holmes-book-cover-poster-art-2-nishanth-gopinathan.jpg" alt="Cover Photo Did Not Load!" height="55%" width="45%;" float: right;>';
            echo '</div>';
            echo '<div class="description" style="margin: 25px; display:inline-block;">';
            echo '<p id="title">Title: ';
            echo $book['title'];
            echo '</p>';
            echo '<button type="button" style="margin: 0px;">Purchase</button>';
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
    } #else {
    #  echo "Search not set";
    #}
    ?>

</body> 
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
