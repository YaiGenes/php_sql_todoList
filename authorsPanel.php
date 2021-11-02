<?php
  include_once "includes/todos_fetching.inc.php";
  // include_once "includes/dbh_pdo.inc.php";
  // include_once "includes/userId_fetching.inc.php";
  $info = $_SESSION["info"];
  $username = $_SESSION["username"];
  // $username = $_SESSION["username"];
  // $val = $_SESSION["userId"];
  // $tasksQuery=$db->prepare("
  //       SELECT `description`, `title` 
  //       FROM task WHERE userId=:userId
  //     ");
  //     $tasksQuery->execute([
  //       "userId"=>$val
  //     ]);

  //     $items = $tasksQuery->rowCount()?$tasksQuery:[];
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
        <?php foreach ($items as $item): ?>
        <li>
          <span class="todo<?php echo $item['isdone'] ? ' done' : ''?>"><?= $item["title"];?></span>
          <?php if(!$item["isdone"]): ?>
          <a class="done-btn" href="#">Mark this as done</a>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
      <p>You dont have any todo!</p>
      <?php endif;?>
      <form method="POST" action="includes/post.inc.php">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Cook rice with mangoes">
        <input class="btn" type="submit" name="posts" value="addTODO">
      </form>
    </div>
  </div>
</body>

</html>