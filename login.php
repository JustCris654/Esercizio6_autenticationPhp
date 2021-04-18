<?php
session_start();

// header('Cache-Control: no cache');
// session_cache_limiter('private_no_expire');

require 'access_db.php';

$conn = access_database_byname('DB_esercizio6');
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <style media="screen">
    span {
      display: flex;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <h1>Login Page</h1>

  <?php
  if (!isset($_GET['error'])) {
      $_GET['error'] = 0;
  }

  if ($_GET['error'] == 0) {
      if (isset($_REQUEST['submit'])) {
          $username = $_REQUEST['username'];
          $password = $_REQUEST['password'];

          $sql = "SELECT nome_utente, password
                  FROM utenti
                  WHERE nome_utente='$username'";
          $result = $conn->query($sql);
          $conn->close();

          if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              if (password_verify($password, $row['password'])) {
                  $_SESSION['user_auth'] = $username;
                  // header('Location: index.php');
                  echo "<p>Benvenuto $username, <a href=\"index.php\">torna alla home page</a></p>";
              }
          } else {
              // echo '<p>Utente non trovato. <a href="/login.php">Riprova</a></p>';
              header('Location: /login.php?error=1');
          }
      } else {
           ?>
        <form action="login.php" method="post">
          <span>
            <label for="username">Inserisci nome utente:</label>
            <input type="text" name="username" id="username">
          </span>

          <span>
            <label for="password">Inserisci password:</label>
            <input type="password" name="password" id="password">
          </span>

          <span>
            <input type="submit" name="submit" value="Login">
          </span>
        </form>
        <a href="signup.php">Registrati</a>
      <?php
      }
  } else {
       ?>
        <h1>Errore di accesso, utente non trovato</h1>
        <form action="login.php" method="post">
          <input type="submit" name="riproba" value="Riprova">
        </form>
        <?php if (isset($_REQUEST['riprova'])) {
            header('Location: /login.php?error=0');
        } ?>
    <?php
  }
  ?>
</body>
</html>
