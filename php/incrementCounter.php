<?php

session_start();
if ($_SESSION['counter'] < 150) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['end'] = true;
}
header('Location: test.php#test');
