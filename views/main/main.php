<?php
  session_start();
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
        <h1>Your ToDo App!</h1>
      </div>
      <div>
        <ul>
          <li><a href="index.php?controller=login&action=loginUser"><img width="25px" src="assets/svg/login.svg"
                alt="login"></a></li>
          <li><a href="index.php?controller=signUp&action=loginSignUp"><img width="25px" src="assets/svg/signup.svg"
                alt="signup"></a></li>
        </ul>
      </div>
      <p class="foot">&copy; 2021 by <a href="https://github.com/YaiGenes" target="_blank">YaiGenes</a></p>
      <p class="foot">Powered by 🐘 and 🐬</p>
    </nav>
  </div>
</body>

</html>