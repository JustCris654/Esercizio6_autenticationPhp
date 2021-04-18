<?php
session_start();
if (!isset($_SESSION['user_auth'])) {
    $_SESSION['user_auth'] = '';
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
  if(isset($_GET['message'])){
    switch ($_GET['message']) {
      case '0':
        echo "<h4>Login avvenuto con successo</h4>";
        break;
      case '1':
        echo "<h4>Logout eseguito</h4>";
        break;
      case '2':
        echo "<h4>Benvenuto, ti sei appena registrato</h4>";
        break;
    }
  }
  $user = $_SESSION['user_auth'];
  if ($user != '') {
      echo "Ciao $user"; ?>
    <form action="index.php" method="post">
      <input type="submit" name="logout" value="Logout">
    </form>
    <?php if (isset($_REQUEST['logout'])) {
        session_destroy();
        header('Location: index.php?message=1');
    }
  } else {
       ?>
    <a href="login.php">Login</a>
  <?php
  }
  ?>

</body>

</html>
