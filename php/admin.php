<?php
session_start();
if (!$_SESSION['logged'] or !isset($_SESSION['logged'])) {
  header('Location: login.php');
  exit();
}
include 'readArticles.php';
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
  <?php if ($_SESSION['logged']) : ?>
    <header>
      <nav>
        <div class="wrapper">
          <a href="../index.php" class="logo"><img src="../images/logo.png" alt="" />New<span>Policy</span></a>
          <ul>
            <li><a class="active" href="#newArticle">Dodaj Newsa</a></li>
          </ul>
          <div class="menu-buttons">
            <a href="logout.php">Wyloguj się!</a>
            <img src="../images/icon-menu-btn-open.svg" alt="" id="open-menu-btn" class="active" />
            <img src="images/icon-menu-btn-close.svg" alt="" id="close-menu-btn" />
          </div>
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

    <section class="news" id="news">
      <h1 class="heading">Newsy</h1>
      <div class="wrapper">
        <?php foreach ($result as $r) : ?>
          <div class="news-box">
            <img src="../images/custom/<?= $r[2] ?>" alt="">
            <h2><?= $r[1] ?></h2>
            <p>(<?= $r[4] ?>)</p>
            <p><?= substr($r[3], 0, strpos($r[3], '.')) . '.'; ?></p>
            <div class="buttons-group">
              <a class="edit" href="./displayNews.php?id=<?= $r[0] ?>">Czytaj wiecej</a>
              <a class="delete" href="./delete.php?id=<?= $r[0] ?>">Usun</a>
            </div>
          </div>
        <?php endforeach; ?>
    </section>

    <section class="new-news" id="newArticle">
      <h1 class="heading">Dodaj News</h1>

      <div class="box-container">
        <form class="box" method="POST" action="insertArticles.php" enctype="multipart/form-data">
          <!-- The window to select a photo does not appear, tested on Google Chrome, Opera GX. To be improved !!! -->
          <input type="file" placeholder="Dodaj zdjęcie" id="image" name="image" class="" accept="image/jpg, image/jpeg, image/png" required />
          <input type="text" placeholder="Dodaj tytuł" id="title" name="title" class="" required />
          <input type="text" placeholder="Dodaj Opis" id="description" name="description" class="" required />
          <input type="text" placeholder="Dodaj datę" name="date" id="date" onfocus="(this.type='date')" onblur="(this.type='text')" name="" id="" />
          <div class="buttons">
            <input type="submit" class="btn green" value="Dodaj">
          </div>
        </form>

      </div>
    </section>

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
            <a href="#" class="links"><img src="..//images/icon-map.svg" alt="" />Kielce, Poland</a>
            <a href="mailto:newpolicy.contact@gmail.com
          " class="links"><img src="../images/icon-email.svg" alt="" />newpolicy.contact@gmail.com</a>
          </div>
        </div>
      </div>
    </section>

    <script src="../js/main.js"></script>
  <?php endif; ?>
</body>

</html>