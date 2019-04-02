<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Landing Page after Clicking the Post it. button</title>
  </head>
  <body>
    <h1>Landing page.</h1>
  </body>
</html>

<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "m576b515", "aixee9Ku", "m576b515");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$un = $_POST["userName"];
$up = $_POST["userPost"];

//--Old code--
$q = "SELECT COUNT(1) FROM Users WHERE user_id = '$un'"; //query I want to test - COUNT(1) is a keyword?
$e = mysql_query($q); //Executes the query
$row = mysql_fetch_row($e); //Fetches the data SELECT COUNT(1) obtained

$sql2 = "INSERT INTO Posts (content,author_id) VALUES ('$up', (SELECT user_id FROM Users WHERE user_id = '$un'));"; //doesn't actually stop the posting from going through??

if($mysqli->query($sql2))
{
  echo "We added that post to the DB 'Posts'";
}
else
{
  echo "We didn't add that post due to reasons.";
}

//--Old code--
// if($row[0] >= 1) //if its >= to 1 then that means it exists (boolean?) so execute the statement below
// {
//
//   $sql2 = "INSERT INTO Posts (content,author_id) VALUES ('$up', (SELECT user_id FROM Users WHERE user_id = '$un'));"; //doesn't actually stop the posting from going through
//   $mysqli->query($sql2);
//   printf("<br><br>Success.");
// }
// else {
//   printf("<br><br>We were not able to process your request at this time.");
// }

/* close connection */
$mysqli->close();
?>
