<?php

session_start();



if (!isset($_SESSION['logged'])) {

    header('Location: login.php');

    exit();
}



$img = $_FILES["image"]["name"];

$title = $_POST['title'];

$description_news = $_POST['description'];

$date = $_POST['date'];



$author =  $_SESSION['login'];

$servername = 'localhost';

$username = 'root';

$password = '';

$dbname = 'newpolicy_db';



$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}



$sql = "INSERT INTO articles (`id`, `title`, `picture`, `content`, `date`, `author`)

VALUES (NULL, '$title', '$img', '$description_news','$date','$author')";



define("ALLOWED_SIZE",   2097152);

define("SAVED_DIRECTORY", "../images/custom/");

$allowed_extensions = array("jpeg", "jpg", "png");



if (isset($_FILES['image'])) {

    $errors = array();



    $uploaded_file_size = $_FILES['image']['size'];

    $uploaded_file_tmp  = $_FILES['image']['tmp_name'];

    $uploaded_file_type = $_FILES['image']['type'];



    $file_compositions = explode('.', $img);

    $file_ext = strtolower(end($file_compositions));



    $saved_file_name = $img;



    if (in_array($file_ext, $allowed_extensions) === false)

        $errors[] = 'Extension not allowed, please choose a JPEG or PNG file';



    if ($uploaded_file_size > ALLOWED_SIZE)

        $errors[] = 'File size is too big';



    if (empty($errors)) {

        move_uploaded_file($uploaded_file_tmp, SAVED_DIRECTORY . $saved_file_name);
    } else {

        print_r($errors);
    }
}

if ($conn->query($sql)) {

    header('Location: admin.php');
} else {

    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
