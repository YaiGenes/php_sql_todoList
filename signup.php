<?php
  session_start();
  $info = $_SESSION["info"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SingUp</title>
</head>

<body>

  <div>
    <?=$info?>
  </div>

  <form action="includes/signup.inc.php" method="POST">
    <h1>SignUp</h1>
    <label for="fullName">Full Name</label>
    <br>
    <input type="text" name="fullName" placeholder="Pedrito Calvo">
    <br>
    <label for="password">Password</label>
    <br>
    <input type="password" name="password" placeholder="Pcr.2390'cda">
    <br>
    <label for="email">email</label>
    <br>
    <input type="email" name="email" placeholder="pedritoc@nose.cii">
    <br>
    <input type="submit" name="submit" value="SignUp">
  </form>

</body>

</html>