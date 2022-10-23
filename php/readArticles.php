<?php
include './connection.php';
$query_str = "SELECT * FROM articles WHERE articles.id > 0 ORDER BY articles.date";
$query = $db->query($query_str);
$result = $query->fetchAll();
$_SESSION['articles'] = $result;
$db = null;
