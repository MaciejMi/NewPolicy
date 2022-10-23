<?php
session_start();
include './connection.php';
if (!isset($_SESSION)) {
    die('Brak sesji!');
}
if ($_GET['answer'] == 2)
    $answer_db = 1;
elseif ($_GET['answer'] == 1)
    $answer_db = 1;
elseif ($_GET['answer'] == -1) {
    $answer_db = 0;
} elseif ($_GET['answer'] == -2) {
    $answer_db = 0;
}
$query_string = "SELECT questions_parties.parties_id FROM questions_parties WHERE questions_parties.question_id = " . $_SESSION['counter'] . " AND questions_parties.answer = " . $answer_db . ";";
$query = $db->query($query_string);
$result = $query->fetchAll();
foreach ($result as $r) {
    $answer = $_GET['answer'];
    if ($answer < 0) $answer *= -1;
    $_SESSION['parties'][$r[0]] += $answer;
}
$query_string2 = "SELECT questions_parties.parties_id FROM questions_parties WHERE questions_parties.question_id = " . $_SESSION['counter'] . " AND questions_parties.answer != " . $answer_db . ";";
$query2 = $db->query($query_string2);
$result2 = $query2->fetchAll();
foreach ($result2 as $r) {
    $answer = $_GET['answer'];
    if ($answer > 0) $answer *= -1;
    $_SESSION['parties'][$r[0]] += $answer;
}
header('Location:incrementIdeologies.php?answer=' . $_GET['answer']);
