<?php	session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="source.js"></script>
    <script  type="text/javascript" src="source.js">

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="scripts\jquery-3.0.0.min.js"></script>
    <script src="scripts\jquery.scrollTo.min.js"></script>
    <script src="scripts\source.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/forum_style.css">
    <link rel="stylesheet" href="styles/fontello/fontello.css">
    <title></title>
    <script>




</script>
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
      <div class="main">
        <br />
        <span id="recent">Ostatnio na Forum: </span><br /><br />
        <div id="forum">
          <?php
          require_once "services/connect.php";
          $conn = new mysqli($host, $db_user, $db_password, $db_name);

          if (!$conn) {
            		die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM tematy ORDER BY data DESC LIMIT 15" ;

            $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {

                      echo "<div class='topicMain'><div class='topic'><a href='posts.php?id=".$row['id']."&nazwa=".$row['nazwa']."&idDzialu=".$row['idDzialu']."'>"
                      . $row['nazwa']."</a><span class='dzial'> w dziale:  ".$row['nazwaDzialu']."</span><span class='topicCounter'>Postów: ".$row['liczbaPostow']."</span><br /><span class='topicInfo'> przez ";
                        if($row['wlasciciel']=='administrator') echo "<span class='topicAdmin'>"; else echo "<span class='topicUser'>";
                    echo "".$row['wlasciciel']."</span> w ".$row['data']."</span></div></div>";

                  //   echo "<div class='topicMain'><div class='topic'><a href='posts.php?id=" .$row['id']."&nazwaDzialu=".$row['nazwa']."&idDzialu=".$row['idDzialu']."'>"
                  //   . $row['nazwa']."</a><span class='topicCounter'>Postów: ".$row['liczbaPostow']."</span><br /><span class='topicInfo'> przez ";
                  //     if($row['wlasciciel']=='administrator') echo "<span class='topicAdmin'>"; else echo "<span class='topicUser'>";
                  // echo "".$row['wlasciciel']."</span> w ".$row['data']."</span></div></div>";


                  }
              } else {
                  echo "0 results";
              }

                mysqli_close($conn);


          ?>



      </div>
    </section>
    <footer>
    </footer>
  </body>
</html>
