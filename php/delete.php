<?php

session_start();

if (!$_SESSION['logged'] or !isset($_SESSION['logged'])) {

    header('Location: login.php');

    exit();

}

include "./connection.php";

$query_string = "DELETE FROM articles WHERE articles.id = " . $_GET['id'] . ";";

$query = $db->query($query_string);

$result = $query->fetchAll();

$db = null;

header("Location:admin.php");

