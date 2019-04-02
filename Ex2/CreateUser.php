<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Landing Page after Clicking the Button</title>
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

$un = $_POST["userSubmission"];

$sql = "INSERT INTO Users (user_id)
VALUES ('$un')";

if ($mysqli->query($sql)) {

    //Printing out success
        printf ("Success.");

    /* free result set */
    $result->free();
}
else {
  printf("I'm sorry, but '$un' is already in the database.");
}

/* close connection */
$mysqli->close();
?>
