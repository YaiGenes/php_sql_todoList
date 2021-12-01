<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <title>Error Page</title>
</head>

<body>
  <?php
  echo "<h1>" . $this->errorMsg . "</h1>"
  ?>
</body>

</html>