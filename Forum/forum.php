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
        if (isset($_SESSION['greetings'])){
        echo "<span class='powitanie'>".$_SESSION['greetings']." ".$_SESSION['user']."!</span>";
        echo "<span class='logoutScreen'>Witaj ".$_SESSION['user'].'! [ <a id="logout" href="services/logout.php">Wyloguj się</a> ]</span>';
	       unset($_SESSION['greetings']);
        }
        else {
          echo "Witaj ".$_SESSION['user'].'! [ <a id="logout" href="services/logout.php">Wyloguj się</a> ]';
        }

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
      <div id="Forum1">
          <div id="forum"><span >Sprzęt<span>
          <?php

          if (isset($_SESSION['online']))
          {
            if($_SESSION['type']=="root") echo " <a class='addSection' href='addSection.php?id=1'>Dodaj Dział</a>";
          }

            echo "</div>";
          require_once "services/connect.php";

          $conn = new mysqli($host, $db_user, $db_password, $db_name);

          if (!$conn) {
            		die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM dzial WHERE idForum='1'";

            $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {

                      echo "<hr class='dashed' /><div class='sections'><a class='section' href='topic.php?id=".$row['id']."&nazwaDzialu=".$row['nazwa']."'>".$row['nazwa']."</a>
                      <span class='sectionInfo'>Tematów: ".$row['liczbaTematow']."</span><span class='sectionInfo'>Postów: ".$row['liczbaPostow']."</span></div>";

                  }
              } else {
                  echo "";
              }

                mysqli_close($conn);



          ?>
        </div>


      <div id="Forum2">
        <div id="forum"><span >Oprogramowanie<span>
          <?php

          if (isset($_SESSION['online']))
          {
            if($_SESSION['type']=="root") echo " <a class='addSection' href='addSection.php?id=2'>Dodaj Dział</a>";
          }

            echo "</div>";
          require_once "services/connect.php";
          $conn = new mysqli($host, $db_user, $db_password, $db_name);

          if (!$conn) {
            		die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM dzial WHERE idForum='2'";

            $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {

                      echo "<hr class='dashed' /><div class='sections'><a class='section' href='topic.php?id=" .$row["id"]."&nazwaDzialu=".$row['nazwa']."'>".$row['nazwa']."</a>
                      <span class='sectionInfo'>Tematów: ".$row['liczbaTematow']."</span><span class='sectionInfo'>Postów: ".$row['liczbaPostow']."</span></div>";

                  }
              } else {
                  echo "";
              }

                mysqli_close($conn);



          ?>

        </div>


      <div id="Forum3">
        <div id="forum"><span >OFF-TOPIC<span>
          <?php

          if (isset($_SESSION['online']))
          {
            if($_SESSION['type']=="root") echo " <a class='addSection' href='addSection.php?id=3'>Dodaj Dział</a>";
          }
           echo "</div>";
          require_once "services/connect.php";
          $conn = new mysqli($host, $db_user, $db_password, $db_name);

          if (!$conn) {
            		die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM dzial WHERE idForum='3'";

            $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {

                      echo "<hr class='dashed' /><div class='sections'><a class='section' href='topic.php?id=" .$row["id"]."&nazwaDzialu=".$row['nazwa']."'>".$row['nazwa']."</a>
                      <span class='sectionInfo'>Tematów: ".$row['liczbaTematow']."</span><span class='sectionInfo'>Postów: ".$row['liczbaPostow']."</span></div>";

                  }
              } else {
                  echo "";
              }

                mysqli_close($conn);


          ?>

        </div>

    </section>
    <footer>

    </footer>
  </body>
</html>
