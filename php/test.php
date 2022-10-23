<?php
session_start();
if (!isset($_SESSION['end'])) {  // Checks if the quiz is finished (> 150)
  $_SESSION['end'] = false;
}
if (!isset($_SESSION['counter'])) { // Question counter
  $_SESSION['counter'] = 1;
}
if (!isset($_SESSION['parties'])) { // Support points for each party
  $_SESSION['parties'] = [40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40];
}
if (!isset($_SESSION['ideologies'])) { // Support points for each ideology
  $_SESSION['ideologies'] = [40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40];
}
if (!isset($_SESSION['ideologiesDescriptions'])) { // Prints descriptions of ideology
  $_SESSION['ideologiesDescriptions'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  include 'connection.php';
  if (!isset($_SESSION)) {
    die('Brak sesji!');
  }
  $query_string = 'SELECT political_ideologies.description FROM political_ideologies ORDER BY political_ideologies.id';
  $query = $db->query($query_string);
  $result = $query->fetchAll();
  $i = 1;
  foreach ($result as $r) {
    $_SESSION['ideologiesDescriptions'][$i] = $r;
    $i++;
  }
  $db = null;
}
if (!isset($_SESSION['partiesLogos'])) { // Prints party logos
  $_SESSION['partiesLogos'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  include './connection.php';
  if (!isset($_SESSION)) {
    die('Brak sesji!');
  }
  $query_string = 'SELECT political_parties.logo FROM political_parties';
  $query = $db->query($query_string);
  $result = $query->fetchAll();
  $i = 1;
  foreach ($result as $r) {
    $_SESSION['partiesLogos'][$i] = $r;
    $i++;
  }
  $db = null;
}
if (!isset($_SESSION['ideologiesLogos'])) {  // Display ideology logos
  $_SESSION['ideologiesLogos'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  include './connection.php';
  if (!isset($_SESSION)) {
    die('Brak sesji!');
  }
  $query_string = 'SELECT political_ideologies.image FROM political_ideologies';
  $query = $db->query($query_string);
  $result = $query->fetchAll();
  $i = 1;
  foreach ($result as $r) {
    $_SESSION['ideologiesLogos'][$i] = $r;
    $i++;
  }
  $db = null;
}

if (!isset($_SESSION['partiesNames'])) { // display the names of the parties
  $_SESSION['partiesNames'] =  [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  include './connection.php';
  if (!isset($_SESSION)) {
    die('Brak sesji!');
  }
  $query_string = 'SELECT political_parties.name FROM political_parties ORDER BY political_parties.id';
  $query = $db->query($query_string);
  $result = $query->fetchAll();
  for ($j = 1; $j < 11; $j++) {
    $_SESSION['partiesNames'][$j] = $result[$j - 1][0];
  }
  $db = null;
}
if (!isset($_SESSION['ideologiesNames'])) { // display the names of ithe deologies
  $_SESSION['ideologiesNames'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  include './connection.php';
  if (!isset($_SESSION)) {
    die('Brak sesji!');
  }
  $query_string = 'SELECT political_ideologies.name FROM political_ideologies ORDER BY political_ideologies.id';
  $query = $db->query($query_string);
  $result = $query->fetchAll();
  for ($j = 1; $j < 21; $j++) {
    $_SESSION['ideologiesNames'][$j] = $result[$j - 1][0];
  }
  $db = null;
}
// --------------------------------------------------
include './connection.php';
if (!isset($_SESSION)) {
  die('Brak sesji!');
}
$query_string = 'SELECT * FROM questions WHERE questions.id = ' . $_SESSION['counter']  . ';';
$query = $db->query($query_string);
$result = $query->fetchAll();
$_SESSION['question'] = $result[0][1];
$db = null;
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
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <nav>
      <div class="wrapper">
        <a href="../index.php" class="logo"><img src="../images/logo.png" alt="" />New<span>Policy</span></a>
        <ul>
          <li><a href="../about.html#about">O nas</a></li>
          <li><a class="active" href="./test.php#quiz">Test</a></li>
          <li><a href="../newsy.php#news">Newsy</a></li>
          <li><a href="../contact.html#contact">Kontakt</a></li>
        </ul>
        <img src="../images/icon-menu-btn-open.svg" alt="" id="open-menu-btn" class="active" />
        <img src="../images/icon-menu-btn-close.svg" alt="" id="close-menu-btn" />
      </div>
    </nav>
  </header>

  <section class="home" id="home">
    <div class="wrapper">
      <div class="content">
        <h1>Chcesz poznać swoje poglądy?</h1>
        <div class="line"></div>
        <h3>Zrób zaawansowany test polityczny i poznaj najbliższą partię, ideologię oraz kompas!</h3>
     <div class="buttons">
          <a href="./test.php#quiz" class="btn">Zrób test poglądów</a>
          <a href="../about.html#about" class="btn">O nas</a>
        </div>
      </div>
    </div>
  </section>
  <?php if (!$_SESSION['end']) : ?>
    <section class="quiz" id = "quiz">
      <h1 class="heading">Poznaj swoją partię</h1>
      <div class="quizBox">
        <h2 class="headingQuiz">Quiz Polityczny</h2>
        <div class="quizTextSort">
          <a id="reset" class="quizText" href="#">Zresetuj<img src="images/icon-right-angless.svg" alt="" /></a>

          <p class="quizText">Pytanie <?= $_SESSION['counter'] ?>/150</p>
        </div>

        <div class="quizTextBorder">
          <p><?= $_SESSION['question'] ?></p>
        </div>

        <form action="" method="POST" class="quizTextForm" id='test'>
          <a class="btn dark-green" href="./incrementParties.php?answer=2">
            <p>Zdecydowanie Tak</p>
          </a>
          <a class="btn green" href="./incrementParties.php?answer=1">
            <p>Raczej Tak</p>
          </a>
          <a class="btn black" href="./writeQuestion.php">
            <p>Nie Wiem</p>
          </a>
          <a class="btn red" href="./incrementParties.php?answer=-1">
            <p>Raczej Nie</p>
          </a>
          <a class="btn dark-red" href="./incrementParties.php?answer=-2">
            <p>Zdecydowanie Nie</p>
          </a>
        </form>
      </div>

      <p class="quizDownText">Jeśli przerwiesz test, Twoje postępy zostaną zapisane</p>
    </section>
  <?php else : ?>
    <section class="quiz">
      <h1 class="heading">Wyniki</h1>
      <h2 class="headingQuiz">Quiz Polityczny</h2>
      <a class="quizText" href="#">Zrób jeszcze raz </a>
      <h3 class="headingQuiz">Partie Polityczne</h3>
      <div class="parties-group">
        <?php for ($i = 1; $i <= 10; $i++) : ?>
          <div class="party-box">
            <?php
            echo '<img style = " height: 100px; " src="data:image/jpeg;base64,' . base64_encode($_SESSION['partiesLogos'][$i][0]) . '"/>';

            ?> <meter min=" 0" max="100" low="30" high="60" optimum="80" value="<?= (int)(100 * ($_SESSION['parties'][$i] / 80)) ?>">
            </meter>
            <h4><?= $_SESSION['partiesNames'][$i] ?></h4>
            <h5> <?= (int)(100 * ($_SESSION['parties'][$i] / 80)) . '%' ?></h5>
          </div>
        <?php endfor; ?>
      </div>
      <br>
      <h3 class="headingQuiz">Ideologie polityczne</h3>
      <div class="ideologies-group">
        <?php for ($i = 1; $i <= 20; $i++) : ?>
          <div class="ideologies-box">
            <?php
            echo '<img style = " height: 100px; " src="data:image/jpeg;base64,' . base64_encode($_SESSION['ideologiesLogos'][$i][0]) . '"/>'; ?>
            <meter min=" 0" max="100" low="20" high="50" optimum="80" value="<?= (int)(100 * ($_SESSION['ideologies'][$i] / 80)); ?>">
            </meter>
            <h4><?= $_SESSION['ideologiesNames'][$i] ?></h4>
            <h5><?= (int)(100 * ($_SESSION['ideologies'][$i] / 80)); ?>%</h5>
            <p><?= $_SESSION['ideologiesDescriptions'][$i][0] ?></p>
          </div>
        <?php endfor; ?>
      </div>
    </section>
  <?php endif ?>
  <section class="footer">
    <div class="footer">
      <div class="box-container">
        <div class="box first">
          <a href="../index.php" class="logo"><img src="../images/logo.png" alt="" />New<span>Policy</span></a>
          <p>Nasze media społecznościowe</p>
         <div class="social">
            <a target = "_blank" href="https://github.com/NewPolicyTeam"><img src="../images/icon-github.svg" alt="" /></a>
            <a target = "_blank"  href="https://www.facebook.com/profile.php?id=100087243605302"><img src="../images/icon-facebook.svg" alt="" /></a>
            <a target = "_blank" href="https://www.instagram.com/newpolicyteam/"><img src="../images/icon-instagram.svg" alt="" /></a>
            <a target = "_blank"  href="https://twitter.com/NewPolicyTeam"><img src="../images/icon-twitter.svg" alt="" /></a>
          </div>
              
        </div>

        <div class="box">
          <h3>Przejdź do</h3>
          <a href="../index.php" class="links">Strona Główna</a>
          <a href="../about.html#about" class="links">O Nas</a>
          <a href="./test.php#quiz" class="links">Test</a>
        </div>

        <div class="box">
          <h3>Przejdź do</h3>
          <a href="../newsy.php#news" class="links">Newsy</a>
          <a href="../contact.html#contact" class="links">Kontakt</a>
        </div>

        <div class="box">
          <h3>Kontakt</h3>
          <a href="#" class="links"><img src="../images/icon-map.svg" alt="" />Kielce, Poland</a>
          <a href="mailto:newpolicy.contact@gmail.com
          " class="links"><img src="../images/icon-email.svg" alt="" />newpolicy.contact@gmail.com</a>
        </div>
      </div>
    </div>
  </section>
  <script src="../js//main.js"></script>
  <script src="../js/confirm.js"></script>
</body>

</html>