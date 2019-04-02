<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Deleting Posts landing page.</title>
  </head>
  <body>
    <h1>After part for deleting information area.</h1>
    <p>These ids will be deleted:<br></p>
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
    echo "You will be deleting: ".$num." post(s)<br>";

    $query = "SELECT * FROM Posts";
    if ($stmt = mysqli_prepare($mysqli, $query)) {

      /* execute query */
      mysqli_stmt_execute($stmt);

      /* store result */
      mysqli_stmt_store_result($stmt);
      $number = mysqli_stmt_num_rows($stmt);

      printf("Number of total posts: %d.\n", mysqli_stmt_num_rows($stmt));

      for ($i=0; $i < $number; $i++)
      {

        //$sql = "DELETE FROM Posts WHERE post_id = '$i';"; //only a statement for now so I do not delete all the stuff I need to test
        if(isset($_POST['deleteBox'][2])) //[] is the number of boxes checked, not the position checked -__- FUUUU
        {
          echo "<br>ran ".$i;
          //echo "This is the post: ".$_POST['deleteBox'][$i];
          //echo "<br>Index ".$i." was selected<br>";
        }
      }

      /* close statement */
      mysqli_stmt_close($stmt);
    }


  }
  $mysqli->close();
}
 ?>
