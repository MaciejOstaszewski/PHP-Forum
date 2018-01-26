<?php	session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="scripts\jquery-3.0.0.min.js"></script>
    <script src="scripts\jquery.scrollTo.min.js"></script>
    <script src="scripts\source.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/forum_style.css">
    <link rel="stylesheet" href="styles/fontello/fontello.css">
    <title></title>
  </head>
  <body>
    <a href="#" class="scrollup"><i class="icon-angle-circled-up"></i></a>
    <header>
      <div id="header">
      <span id="top"><a href="index.php">Forum</a><a href="index.php"><i class="icon-laptop"></i></a></span>
      <?php
      if (isset($_SESSION['online']))
      {
        echo "Witaj ".$_SESSION['user'].'! [ <a id="logout" href="services/logout.php">Wyloguj się</a> ]';

      }

      ?>
      </div>
    </header>
    <nav>

    </nav>
    <section>
      <div id="navbar">
        <ol>
          <li><a href="index.php">Strona główna</a></li>
          <li><a href="forum.php">Forum Dyskusyjne</a></li>
          <li><a href="login_form.php">Zaloguj się</a></li>
          <li><a href="register_form.php">Rejestracja</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="rules.php">Regulamin</a></li>
    </ol>
      </div>

          <?php
          require_once "services/connect.php";
          $conn = new mysqli($host, $db_user, $db_password, $db_name);

          if (!$conn) {
            		die("Connection failed: " . mysqli_connect_error());
            }
            $idTematu = $_GET['id'];
            $sql = "SELECT * FROM tematy WHERE id=".$idTematu ;

            $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $nazwaTematu[$row["id"]] = $row['nazwa'];
                    $idDzialu[$row["id"]] = $row['idDzialu'];
                  echo "<div class='main'>
                        <div class='postMain'><div class='postTitle'><span class='postTopic'>".$row['nazwa']."</span><br /><span class='postInfo'>
                        przez ";
                        if($row['wlasciciel']=='administrator') echo "<span class='topicAdmin'>"; else echo "<span class='topicUser'>";
                        echo "".$row['wlasciciel']."</span> w ".$row['data']."</div></span>
                        <div class='postContents'>"  .$row['tresc']."</div></div></div>";
                      //
                      //   echo "<div class='topicMain'><div class='topic'><a href='posts.php?id=" .$row['id']."&nazwa=".$row['nazwa']."&idDzialu=".$row['idDzialu']."'>"
                      //   . $row['nazwa']."</a><span class='topicCounter'>Postów: ".$row['liczbaPostow']."</span><br /><span class='topicInfo'> przez ";
                      //     if($row['wlasciciel']=='administrator') echo "<span class='topicAdmin'>"; else echo "<span class='topicUser'>";
                      // echo "".$row['wlasciciel']."</span> w ".$row['data']."</span></div></div>";
                  }
              } else {
                  echo "";
              }

            $sql = "SELECT * FROM posty WHERE idTematu=".$idTematu ;

            $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {


                            echo "<div class='main'>
                        <div class='postMain'><div class='postTitle'><span class='postReTopic'>Re: ".$row['temat']."";

                        if (isset($_SESSION['online'])){
                        if($_SESSION['type']=="root" || $_SESSION['user']==$row['wlasciciel'])

                        echo "<a href='services/deletePost.php?id=".$row['id']."&idTematu=".$idTematu."&nazwaTematu=".$nazwaTematu[$row['idTematu']]."&idDzialu=".$idDzialu[$row['idTematu']]."'
                        class='deletePost'><i class='icon-trash'></i></a>
                        <a href='editPostForm.php?id=".$row['id']."&idTematu=".$idTematu."&nazwaTematu=".$nazwaTematu[$row['idTematu']]."&idDzialu=".$idDzialu[$row['idTematu']]."&tresc=".$row['tresc']."'
                        class='editPost'><i class='icon-pencil'></i></a>";
                        }
                        echo "</span><br /><span class='postInfo'>
                        przez ";
                        if($row['wlasciciel']=='administrator') echo "<span class='topicAdmin'>"; else echo "<span class='topicUser'>";
                        echo "".$row['wlasciciel']."</span> w ".$row['data']."</div></span>
                        <div class='postContents'>"  .$row['tresc']."</div></div></div>";

                  }
              } else {
                  echo "";
              }

                mysqli_close($conn);



          ?>


    </section>
    <?php
    if (isset($_SESSION['online']))
    {
      echo " <a class='addPost' href='addPost.php?id=" .$idTematu."&nazwa=".$_GET['nazwa']."&idDzialu=".$_GET['idDzialu']."'>Dodaj Post</a>";
    }
     ?>
    <footer>

    </footer>
  </body>
</html>
