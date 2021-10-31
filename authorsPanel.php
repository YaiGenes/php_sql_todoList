<?php
  session_start();
  include_once "includes/dbh.inc.php";
  $info = $_SESSION["info"];
  $username = $_SESSION["username"]
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
  <h3>Welcome to your postWall <?=$username?>!</h3>



  <?php
    $sql = "SELECT `id` FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if ($result !== false) {
    $value = mysqli_fetch_object($result);
    $_SESSION['tempIdObj'] = get_object_vars($value);
    $arrId = $_SESSION['tempIdObj'];
    $val = $arrId["id"];
    echo $val;
    $_SESSION["userId"] = $val;
  }

      $sql = "SELECT `description` FROM post WHERE userId='$val'";
      $result = mysqli_query($conn, $sql);

      $resultCheck = mysqli_num_rows($result);
      
      if ($resultCheck>0) {
        while ($row=mysqli_fetch_assoc($result)) {
           echo $row["description"] ."<br/>";
         }
      }
    ?>

  <a href="includes/logout.inc.php">Logout</a>
</body>

</html>