<?php
session_start();
require_once "connect.php";
$conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$id = $_GET['id'];
$idTematu = $_GET['idTematu'];
$idDzialu = $_GET['idDzialu'];
$nazwaTematu = $_GET['nazwaTematu'];
$sql = "DELETE FROM posty WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$sql = "UPDATE tematy SET liczbaPostow=liczbaPostow-'1' WHERE id='$idTematu'";

if ($conn->query($sql) === TRUE){
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "UPDATE dzial SET liczbaPostow=liczbaPostow-'1' WHERE id='$idDzialu'";

if ($conn->query($sql) === TRUE){
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header('Location: ../posts.php?id='.$idTematu.'&nazwa='.$nazwaTematu.'&idDzialu='.$idDzialu.'');
?>
