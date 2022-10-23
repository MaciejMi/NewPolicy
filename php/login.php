<?php
session_start();
if (!isset($_SESSION['error'])) {
  $_SESSION['error'] = '';
}
if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true)) {
  header('Location: admin.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NewPolicy</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Raleway:wght@700;800;900&display=swap" rel="stylesheet" />
</head>

<body>
  <section class="login">
    <div class="wrapper">
      <div class="box-container">
        <div class="circle">
          <img src="../images/icon-login-for-circle.svg" alt="" />
        </div>

        <form action="./login_sys.php" method="POST">
          <div class="border">
            <img src="../images/icon-user-panel.svg" alt="" />
            <input type="text" placeholder="Nazwa Użytkownika" name="login" id="login" required />
          </div>

          <div class="border borderBottom">
            <img src="../images/icon-password.svg" alt="" />
            <input type="password" placeholder="Hasło" name="password" id="password" required />
          </div>
          <p class="error"><?= $_SESSION['error']; ?></p>
          <div class="button">
            <input type="submit" class="btn" value="Zaloguj się"></input>
          </div>
        </form>
      </div>
    </div>
  </section>

  <script src="../js/main.js"></script>
</body>

</html>