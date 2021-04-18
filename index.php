<?php
session_start();
if (!isset($_SESSION['users_auth'])) {
    $_SESSION['users_auth'] = '';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <?php
  $user = $_SESSION['users_auth'];
  if ($user != '') {
      echo "Ciao $user"; ?>
    <form action="index.php" method="post">
      <input type="submit" name="logout" value="Logout">
    </form>
    <?php if (isset($_REQUEST['logout'])) {
        session_destroy();
        header('Refresh:0');
    }
  } else {
       ?>
    <a href="login.php">Login</a>
  <?php
  }
  ?>

</body>

</html>
