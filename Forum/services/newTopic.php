<?php
session_start();
require_once "connect.php";
$name = $_POST['nazwa'];
$contents = $_POST['contents'];
$nick = $_SESSION['user'];
$conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $idDzialu = $_GET['id'];
    $nazwaDzialu = $_GET['nazwaDzialu'];
    $sql = "INSERT INTO tematy (nazwa, tresc, idDzialu, wlasciciel, liczbaPostow, nazwaDzialu) VALUES ('$name','$contents','$idDzialu','$nick','1','$nazwaDzialu')";

    if ($conn->query($sql) === TRUE){
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "UPDATE dzial SET liczbaTematow=liczbaTematow+'1', liczbaPostow=liczbaPostow+'1' WHERE id='$idDzialu'";

    if ($conn->query($sql) === TRUE){
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "SELECT id FROM tematy ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
               $idTematu = $row['id'];

          }
      } else {
          echo "0 results";
      }

      $conn->close();
          header('Location: ../posts.php?id='.$idTematu.'&nazwa='.$name.'&idDzialu='.$idDzialu.'');


 ?>
