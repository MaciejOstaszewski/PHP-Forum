<?php
session_start();
require_once "connect.php";
$contents = $_POST['contents'];
$nick = $_SESSION['user'];
$conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $idTematu = $_GET['id'];
    $idDzialu = $_GET['idDzialu'];
    $topic = $_GET['nazwa'];
    $sql = "INSERT INTO posty (temat, tresc, idTematu, wlasciciel) VALUES ('$topic','$contents','$idTematu','$nick')";

    if ($conn->query($sql) === TRUE){
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "UPDATE dzial SET liczbaPostow=liczbaPostow+'1' WHERE id='$idDzialu'";

    if ($conn->query($sql) === TRUE){
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "UPDATE tematy SET liczbaPostow=liczbaPostow+'1' WHERE id='$idTematu'";

    if ($conn->query($sql) === TRUE){
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
      $conn->close();
          header('Location: ../posts.php?id='.$idTematu.'&nazwa='.$_GET['nazwa'].'&idDzialu='.$idDzialu.'');

 ?>
