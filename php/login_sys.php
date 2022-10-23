<?php
session_start();

if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}

if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
    header('Location: login.php');
    exit();
}

include "./connection.php";
$login = $_POST['login'];
$password = $_POST['password'];
$query_string = "SELECT users.login, users.password FROM users;";
$query = $db->query($query_string);
$result = $query->fetchAll();
$i = 0;
foreach ($result as $r) {
    if ($login == $result[$i][0] and $password == $result[$i][1]) {
        $_SESSION['logged'] = true;
        $_SESSION['login'] = $login;
        header("Location: admin.php");
        exit();
        break;
    }
    $i++;
}
$_SESSION['error'] = "Złe dane logowania!";
header("Location: login.php");
$db = null;
