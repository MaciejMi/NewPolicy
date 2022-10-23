<?php
session_start();
include "./php/connection.php";
$query_str = "SELECT * FROM articles WHERE articles.id > 0 ORDER BY articles.date";
$query = $db->query($query_str);
$result = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NewPolicy</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Raleway:wght@700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <header>
    <nav>
      <div class="wrapper">
        <a href="./index.php" class="logo"><img src="./images/logo.png" alt="" />New<span>Policy</span></a>
        <ul>
          <li><a href="./about.html#about">O nas</a></li>
          <li><a href="./php/test.php#quiz">Test</a></li>
          <li><a class="active" href="./newsy.php#news">Newsy</a></li>
          <li><a href="./contact.html#contact">Kontakt</a></li>
        </ul>
        <img src="images/icon-menu-btn-open.svg" alt="" id="open-menu-btn" class="active" />
        <img src="images/icon-menu-btn-close.svg" alt="" id="close-menu-btn" />
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
          <a href="/php/test.php#quiz" class="btn">Zrób test poglądów</a>
          <a href="./about.html#about" class="btn">O nas</a>
        </div>
      </div>
    </div>
  </section>

  <section class="news" id="news">
    <h1 class="heading">Newsy</h1>
    <div class="wrapper">
      <?php foreach ($result as $r) : ?>
        <div class="news-box">
          <img src="./images/custom/<?= $r[2] ?>" alt="">
          <h2><?= $r[1] ?></h2>
          <p>(<?= $r[4] ?>)</p>
          <p><?= substr($r[3], 0, strpos($r[3], '.')) . '.'; ?></p>
          <a class="btn" href="./php/displayNews.php?id=<?= $r[0] ?>">Czytaj wiecej</a>
        </div>
      <?php endforeach; ?>
  </section>


  <section class="footer">
    <div class="footer">
      <div class="box-container">
        <div class="box first">
          <a href="./index.php" class="logo"><img src="images/logo.png" alt="" />New<span>Policy</span></a>
          <p>Nasze media społecznościowe</p>
          <div class="social">
            <a target = "_blank" href="https://github.com/NewPolicyTeam"><img src="images/icon-github.svg" alt="" /></a>
            <a target = "_blank"  href="https://www.facebook.com/profile.php?id=100087243605302"><img src="images/icon-facebook.svg" alt="" /></a>
            <a target = "_blank" href="https://www.instagram.com/newpolicyteam/"><img src="images/icon-instagram.svg" alt="" /></a>
            <a target = "_blank"  href="https://twitter.com/NewPolicyTeam"><img src="images/icon-twitter.svg" alt="" /></a>
          </div>
        </div>

        <div class="box">
          <h3>Przejdź do</h3>
          <a href="./index.php" class="links">Strona Główna</a>
          <a href="./about.html#about" class="links">O Nas</a>
          <a href="./php/test.php#quiz" class="links">Test</a>
        </div>

        <div class="box">
          <h3>Przejdź do</h3>
          <a href="./newsy.php#news" class="links">Newsy</a>
          <a href="./contact.html#contact" class="links">Kontakt</a>
        </div>

        <div class="box">
          <h3>Kontakt</h3>
          <a href="#" class="links"><img src="./images/icon-map.svg" alt="" />Kielce, Poland</a>
          <a href="mailto:newpolicy.contact@gmail.com
          " class="links"><img src="./images/icon-email.svg" alt="" />newpolicy.contact@gmail.com</a>
        </div>
      </div>
    </div>
  </section>

  <script src="./js/main.js"></script>
</body>

</html>