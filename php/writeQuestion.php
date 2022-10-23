<?php
session_start();
include 'connection.php';
if (!isset($_SESSION)) {
    die('Brak sesji!');
}
$query_string = 'SELECT * FROM questions WHERE questions.id = ' . $_SESSION['counter']  . ';';
$query = $db->query($query_string);
$result = $query->fetchAll();
$_SESSION['question'] = $result[0][1];
$db = null;
header('Location: incrementCounter.php');
