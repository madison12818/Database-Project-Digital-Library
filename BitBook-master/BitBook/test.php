<!DOCTYPE html>
<html>
  <body>

    <form method = "post">
      Enter search term:<br>
      <table>
      <tr>
        <td>
      <input type="text" name="term" id="term" /><br>
        </td>
      </tr>

      <tr>
        <td>
        <input name = "add" type = "submit" id = "add" value = "Update">
        </td>
      </tr>
      </table>


<p></p>
<?php
function get_books($term) {

  $output = shell_exec("python3.8 ../BitBook\ Backend/search.py $term");
  echo $output;
  }
  if(isset($_POST['term'])) {
  get_books($_POST['term']);
  }
?>

</body>
</html>
