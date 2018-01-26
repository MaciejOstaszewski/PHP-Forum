<?php	session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="scripts\jquery-3.0.0.min.js"></script>
    <script src="scripts\jquery.scrollTo.min.js"></script>
    <script src="scripts\jquery.validate.min.js"></script>
    <script src="scripts\source.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login_form_style.css" type="text/css" />
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
        <div id="from_container">
          <div id="form_border">
            <?php
              echo "<form id='addPostForm' action='services/newPost.php?id=".$_GET['id']."&nazwa=".$_GET['nazwa']."&idDzialu=".$_GET['idDzialu']."' method='post'>";

            ?>
            Treść posta:<br /><br />
            <textarea rows="4" cols="50" name="contents" class="required"></textarea>

            <input type="submit" value="Dodaj Post">

          </form>
          </div>
      </div>
    </section>
    <footer>
    </footer>
  </body>
</html>
