<?php
session_start();

require 'access_db.php';
$conn = access_database_byname('DB_esercizio6');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="validateForm.js" charset="utf-8"></script>
    <title>Sign Up</title>
  </head>
  <body>
    <h1>Registrati</h1>
    <form action="signup.php" method="post" name="signup_form" onsubmit="return validateForm()">
      <label for="email">Inserisci email:</label>
      <input type="email" name="email" id="email" required> <br>

      <label for="username">Inserisci username:</label>
      <input type="text" name="username" id="username" required> <br>

      <label for="password">Inserisci password:</label>
      <input type="password" name="password" id="password" required> <br>

      <label for="password_2">Reinserisci password:</label>
      <input type="password" name="password_2" id="password_2" required> <br>

      <input type="submit" name="signup" value="Sign Up">
    </form>

    <?php if (isset($_REQUEST['singup'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];



        $hashedpws = password_hash($password, PASSWORD_DEFAULT);

        $date_now = date('Y-m-d H:i:s');

        $sql = "INSERT INTO utenti (nome_utente, password, email, data_registrazione)
              VALUES ('$username', '$hashedpws','$email', '$date_now')";
        if ($conn->query($sql) === true) {
        }
    } ?>
  </body>
</html>
