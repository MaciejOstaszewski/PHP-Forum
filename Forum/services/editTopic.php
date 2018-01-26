<?php
session_start();
require_once "connect.php";
$conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $idDzialu = $_GET['idDzialu'];
    $nazwaDzialu = $_GET['nazwaDzialu'];

    $nazwa = $_POST['nazwa'];
    $tresc = $_POST['contents'];
    $sql = "UPDATE tematy SET nazwa='$nazwa', tresc='$tresc' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
header('Location: ../topic.php?id='.$idDzialu.'&nazwaDzialu='.$nazwaDzialu.'');

?>
