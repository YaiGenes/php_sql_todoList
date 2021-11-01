<?php
  session_start();
  $_SESSION["info"]="";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <title>Home</title>
</head>

<body>
  <div class="container">
    <nav>
      <div>
        <h1>Your ToDo App with 🐘 and 🐬</h1>
      </div>
      <div>
        <ul>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">SignUp</a></li>
        </ul>
      </div>
    </nav>
  </div>
</body>

</html>