<?php
  session_start();
  include_once "includes/dbh.inc.php";
  $info = $_SESSION["info"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Authors Panel</title>
</head>

<body>
  <div>
    <?=$info?>
  </div>

  <?php
      
      $sql = "SELECT * FROM user;";
      $result = mysqli_query($conn, $sql);

      $resultCheck = mysqli_num_rows($result);
      
      if ($resultCheck>0) {
        while ($row=mysqli_fetch_assoc($result)) {
          echo $row["email"] ."<br/>";
          echo "<hr>";
          echo $row["username"] ."<br/>";
          echo "<hr>";
          echo $row["pwd"] ."<br/>";
          echo "<hr>";
        }
      }
    ?>
</body>

</html>