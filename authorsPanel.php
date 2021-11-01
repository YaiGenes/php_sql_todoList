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
  <link rel="stylesheet" href="css/panel.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <nav>
      <div>
        <?=$info?>
      </div>
      <h2>Welcome to your todoWall <?=$username?>!</h2>
      <a href="includes/logout.inc.php">Logout</a>
    </nav>
    <form method="POST" action="includes/post.inc.php">
      <label for="title">Title</label>
      <input type="text" name="title" placeholder="Cook rice with mangoes">
      <label for="description">Description</label>
      <input type="text" name="description" placeholder="Cook the rice and add the mango slices">
      <input class="btn" type="submit" name="posts" value="addTODO">
    </form>

    <?php
  //Fetching the userId from user table in the database

    $sql = "SELECT `id` FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if ($result !== false) {
    $value = mysqli_fetch_object($result);
    $_SESSION['tempIdObj'] = get_object_vars($value);
    $arrId = $_SESSION['tempIdObj'];
    $val = $arrId["id"];
    $_SESSION["userId"] = $val;
  }

  //Fetching the post description and title from the task table in the db
  
      $sql = "SELECT `description`, `title` FROM task WHERE userId='$val'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck>0) {
        while ($row=mysqli_fetch_assoc($result)) {
          echo '<strong>'.$row["title"].'</strong>' ."<br/>";
          echo $row["description"] ."<br/>";
        }
      }
    ?>
  </div>
</body>

</html>