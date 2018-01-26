<?php
session_start();
$id = $_GET['id'];
$idDzialu = $_GET['idDzialu'];
$nazwaDzialu = $_GET['nazwaDzialu'];
if($_GET['liczbaPostow']>'1')
{
    $_SESSION['error'] = "Nie można usnąć tematu ponieważ zawiera posty";
    header('Location: ../topic.php?id='.$idDzialu.'&nazwaDzialu='.$nazwaDzialu.'');
    exit();
}
else {


require_once "connect.php";

$conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


$sql = "DELETE FROM tematy WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$sql = "UPDATE dzial SET liczbaTematow=liczbaTematow-'1', liczbaPostow=liczbaPostow-'1' WHERE id='$idDzialu'";

if ($conn->query($sql) === TRUE){
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
 header('Location: ../topic.php?id='.$idDzialu.'&nazwaDzialu='.$nazwaDzialu.'');
?>
