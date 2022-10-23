<?php

$db = new PDO('mysql:host=localhost;dbname=newpolicy_db', 'root', '');

if (!$db) {

  die('Błąd połączenia z bazą danych!');
}
