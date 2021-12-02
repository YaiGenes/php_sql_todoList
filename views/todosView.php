<?php
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
  <link rel="stylesheet" href="../css/panel.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <nav>
      <div>
        <?= $info ?>
      </div>
      <h2>Welcome to your todoWall <?= $username ?>!</h2>
      <a class="logout" href="<?php echo BASE_URL . '\users\\logout' ?>"><img width="25px"
          src="../assets/svg/logout.svg" alt="logout"></a>
    </nav>
    <h3>ToDos</h3>
    <div class="todo-list">
      <?php if (!empty($this->todos)) : ?>
      <ul class="todos">
        <?php foreach ($this->todos as $todo) : ?>
        <li class="task">
          <div class="flex">
            <span class="todo<?php echo $todo['isdone'] ? ' done' : '' ?>"><?= $todo["title"]; ?></span>
            <div class="functions-container">
              <?php if (!$todo["isdone"]) : ?>
              <a class="done-btn" href="index.php?controller=done&action=markAsDone&todo=<?= $todo['id']; ?>"><img
                  src="../assets/svg/check.svg" width="10px" alt="done"></a>
              <?php endif; ?>
              <a class="delete-btn" href="index.php?controller=delete&action=delete&id=<?= $todo['id']; ?>"><img
                  src="../assets/svg/trash.svg" width="10px" alt="delete"></a>
              <a class="edit-btn" href="index.php?controller=preEdit&action=pEdit&id=<?= $todo['id']; ?>"><img
                  src="../assets/svg/edit.svg" width="10px" alt="edit"></a>
            </div>
          </div>
          <?php if ($todo["isedit"]) : ?>
          <form class="edit-form" method="POST" action="index.php?controller=edit&action=edit&id=<?= $todo['id']; ?>">
            <input type="text" name="title" placeholder="Editing...">
            <input class="btn" type="submit" name="edit" value="Edit">
          </form>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php else : ?>
      <p>You dont have any todo!</p>
      <?php endif; ?>
    </div>
    <form method="POST" action="index.php?controller=addTask&action=addTask">
      <input type="text" name="title" placeholder="Cook rice with mangoes">
      <input class="btn" type="submit" name="posts" value="addTODO">
    </form>
  </div>
</body>

</html>