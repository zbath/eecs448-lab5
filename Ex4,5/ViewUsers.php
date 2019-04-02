<table border="1">
  <tr>
    <th>Username List</th>
  </tr>




<title>Viewing Users in database</title>


<?php

//table of all users goes here

//creating connection
$mysqli = new mysqli("mysql.eecs.ku.edu", "m576b515", "aixee9Ku", "m576b515");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$sql = "SELECT * FROM Users;";
$result = $mysqli->query($sql);


if ($result->num_rows > 0)
{

  while ($row = $result->fetch_assoc())
  {

    printf("<tr><td>%s</td></tr>", $row["user_id"]);
  }

}
else {
  echo "0 results.";
}

$mysqli->close();


 ?>
</table>
