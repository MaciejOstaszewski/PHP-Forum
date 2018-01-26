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
        $tresc = $_POST['contents'];
        $sql = "UPDATE posty SET tresc='$tresc' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
header('Location: ../posts.php?id='.$idTematu.'&nazwa='.$nazwaTematu.'&idDzialu='.$idDzialu.'');
    ?>
