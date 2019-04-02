<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Backend for displaying user tables.</title>
  </head>
  <body>
    <center>
    <table border="1">
      <tr>
        <th>Post ID</th>
        <th>Content</th>
        <th>Username</th>
      </tr>
      <?php showTable(); ?>
    </table>
  </center>
  </body>
</html>

<?php

function showTable()
{
  //creating connection
  $mysqli = new mysqli("mysql.eecs.ku.edu", "m576b515", "aixee9Ku", "m576b515");
  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $un = $_POST["username"];

  $sql = "SELECT * FROM Posts WHERE author_id = '$un';";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0)
  {
    while ($row = $result->fetch_assoc()) //need to change this so that it shows a specified user, not just all the Posts table.
    {
      //echo "<tr><td>".$row["user_id"]."</td></tr>"; //Testing Users table
      echo "<tr><td>".$row["post_id"]."</td><td>".$row["content"]."</td><td>".$row["author_id"]."</td></tr>";
    }
  }
  else {
    echo "0 results.";
  }
  $mysqli->close(); //closing connection
}


?>
