<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>

<body>
  <h1>Login</h1>
  <form action="includes/login.inc.php" method="POST">
    <label for="fullName">Full Name</label>
    <br>
    <input type="text" name="fullName" placeholder="Pedrito Calvo">
    <br>
    <label for="password">Password</label>
    <br>
    <input type="password" name="password" placeholder="Pcr.2390'cda">
    <br>
    <input type="submit" name="submit" value="SignUp">
  </form>

  <a href="signup.php">If you are not registered you can go back clicking here to SignUp</a>

</body>

</html>