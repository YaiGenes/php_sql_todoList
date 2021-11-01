<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <nav>
      <div class="title">
        <h1>Your ToDo App by 🐘 and 🐬</h1>
      </div>
      <menu class="menu">
        <div>
          <h2>Login</h2>
        </div>
        <div>
          <a href="signup.php">SignUp</a>
        </div>
      </menu>
    </nav>
    <form action="includes/login.inc.php" method="POST">
      <label for="fullName">Full Name</label>
      <br>
      <input type="text" name="fullName" placeholder="Pedrito Calvo">
      <br>
      <label for="password">Password</label>
      <br>
      <input type="password" name="password" placeholder="Pcr.2390'cda">
      <br>
      <input class="btn" type="submit" name="submitting" value="Login">
    </form>
  </div>
</body>

</html>