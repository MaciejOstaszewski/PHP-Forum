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
      <div class="topicError">
        <?php
        if(isset($_SESSION['error'])) echo "<span class='topicError'>".$_SESSION['error']."</span>";
         ?>
      </div>
      <div class="main">
        <div id="forum">
          <?php
          require_once "services/connect.php";
          $conn = new mysqli($host, $db_user, $db_password, $db_name);

          if (!$conn) {
            		die("Connection failed: " . mysqli_connect_error());
            }
            $idDzialu = $_GET['id'];
            $nazwaDzialu = $_GET['nazwaDzialu'];
            $sql = "SELECT * FROM tematy WHERE idDzialu=".$idDzialu ;

            $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {

                      echo "<div class='topicMain'><div class='topic'><a href='posts.php?id=" .$row['id']."&nazwa=".$row['nazwa']."&idDzialu=".$row['idDzialu']."'>"
                      . $row['nazwa']."</a>
                      </span><span class='topicCounter'>";
                      if (isset($_SESSION['online'])){
                      if($_SESSION['type']=="root" || $_SESSION['user']==$row['wlasciciel'])

                      echo "<a href='services/deleteTopic.php?id=".$row['id']."&idDzialu=".$idDzialu."&nazwaDzialu=".$nazwaDzialu."&liczbaPostow=".$row['liczbaPostow']."'
                      class='deletePost'><i class='icon-trash'></i></a>
                      <a href='editTopicForm.php?id=".$row['id']."&idDzialu=".$idDzialu."&nazwaDzialu=".$nazwaDzialu."&nazwaTematu=".$row['nazwa']."&trescTematu=".$row['tresc']."'
                      class='editPost'><i class='icon-pencil'></i></a>";
                      }
                      echo "Postów: ".$row['liczbaPostow']."</span>
                      <br /><span class='topicInfo'> przez ";
                        if($row['wlasciciel']=='administrator') echo "<span class='topicAdmin'>"; else echo "<span class='topicUser'>";
                    echo "".$row['wlasciciel']."</span> w ".$row['data']."</div></div>";

                  }
              } else {
                  echo "Brak Tematów";
              }

                mysqli_close($conn);

          ?>
        </div>




    </section>
    <?php
  		if(isset($_SESSION['error']))	unset($_SESSION['error']);
      if (isset($_SESSION['online']))
      {
        echo " <a class='addTopic' href='addTopic.php?id=" .$idDzialu."&nazwaDzialu=".$nazwaDzialu."'>Nowy Temat</a>";
      }
      ?>
    <footer>

    </footer>
  </body>
</html>
