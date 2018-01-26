<?php
require_once "connect.php";
$name = $_POST['nazwa'];
$conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_GET["id"];
    $sql = "INSERT INTO dzial (nazwa,idForum) VALUES ('$name','$id')";

    if ($conn->query($sql) === TRUE){
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

      $conn->close();
          header('Location: ../forum.php');

 ?>
