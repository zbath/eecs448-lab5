<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Deleting Posts landing page.</title>
  </head>
  <body>
    <h1>After part for deleting information area.</h1>
    <?php deleteDisplay() ?>
  </body>
</html>


<?php
function deleteDisplay()
{
  $mysqli = new mysqli("mysql.eecs.ku.edu", "m576b515", "aixee9Ku", "m576b515");

  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $boxes = $_POST["deleteBox"];
  if(false) //empty($boxes)
  {
    echo "You did not select anything to delete";
  }
  else
  {
    $num = count($boxes); //number of checked boxes
    echo "You will be deleting: ".$num." post(s)<br>---------------------------------------------<br>";

    $query = "SELECT * FROM Posts";
    if ($stmt = mysqli_prepare($mysqli, $query)) {

      /* execute query */
      mysqli_stmt_execute($stmt);

      /* store result */
      mysqli_stmt_store_result($stmt);
      $number = mysqli_stmt_num_rows($stmt);

      printf("Total number of posts in Posts: %d\n<br>---------------------------------------------<br>", mysqli_stmt_num_rows($stmt));

      echo "<br>Begin deletion<br>";

      for ($i=0; $i < $number; $i++)
      {
          if($_POST['deleteBox'][$i] != "") //if we pass over a value, the box has been checked
          {
            echo "----------------------------------<br>***post_id to be deleted: ".$_POST['deleteBox'][$i]."***<br>";
          }
          $toDelete = $_POST['deleteBox'][$i];
          $sql = "DELETE FROM Posts WHERE post_id = '$toDelete'";
          $result = $mysqli->query($sql);
      }

      /* close statement */
      mysqli_stmt_close($stmt);
    }


  }
  echo "<br><br>End deletion.";
  $mysqli->close();
}
 ?>
