<?php
  include_once "includes/todos_fetching.inc.php";
  $info = $_SESSION["info"];
  $username = $_SESSION["username"];
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
    <div class="todo-list">
      <h3>ToDos</h3>
      <?php if(!empty($items)):?>
      <ul class="todos">
        <li>
          <span class="todo">Cook rice and mangoes</span>
          <a href="#" class="done-button">Mark as done</a>
        </li>
      </ul>
      <?php else: ?>
      <p>You dont have any todo!</p>
      <?php endif;?>
      <form method="POST" action="includes/post.inc.php">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Cook rice with mangoes">
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Cook the rice and add the mango slices">
        <input class="btn" type="submit" name="posts" value="addTODO">
      </form>
    </div>

    <?php
      foreach ($items as $item) {
        echo '<strong>'.$item["title"].'</strong>' ."<br/>";
        echo $item["description"] ."<br/>";
      }
    ?>
  </div>
</body>

</html>