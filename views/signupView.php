<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SingUp</title>
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
          <h2>SingUp</h2>
        </div>
        <div>
          <a href="index.php?controller=users&action=loginSystem&type=register">Login</a>
        </div>
      </menu>
    </nav>
    <form action="index.php?controller=users&action=loginSystem" method="POST">
      <h1>SignUp</h1>
      <input type="hidden" name="type" value="register">
      <label for="fullName">Full Name</label>
      <input type="text" name="fullName" placeholder="Pedrito Calvo">
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Pcr.2390'cda">
      <label for="email">email</label>
      <input type="email" name="email" placeholder="pedritoc@nose.cii">
      <input class="btn" type="submit" name="submit" value="SignUp">
    </form>
  </div>
</body>

</html>