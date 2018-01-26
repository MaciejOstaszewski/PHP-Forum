<?php	session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="scripts\jquery-3.0.0.min.js"></script>
    <script src="scripts\jquery.scrollTo.min.js"></script>
    <script src="scripts\source.js"></script>
	  <link rel="stylesheet" href="styles/style.css" type="text/css" />
    <link rel="stylesheet" href="styles/rules_style.css" type="text/css" />
    <link rel="stylesheet" href="styles/fontello/fontello.css">
    <title></title>
  </head>
  <body>
    <a href="#" class="scrollup"><i class="icon-angle-circled-up"></i></a>
    <header>
      <div id="header">
      <span id="top"><a href="index.php" id="h1">Forum</a><a href="index.php"><i class="icon-laptop"></i></a></span>
      <?php
      if (isset($_SESSION['online']))
      {
        echo "Witaj ".$_SESSION['user'].'! [ <a id="logout" href="services/logout.php">Wyloguj się</a> ]';
      }
      ?>
      </div>
    </header>
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
      <div class = 'content'>
        <h2>Każdy zarejestrowany użytkownik forum akceptuje poniższe zasady. W przypadku ich nie stosowania grożą ostrzeżenia, a w dalszej kolejności banicja. Użytkownik również jest zobowiązany do czytania regulaminów przypiętych do poszczególnych działów, oraz <strong>stosowania się do innych, osobistych uwag administratorów i moderatorów, których nie ma w poniższym regulaminie</strong>.</h2>
          <hr />
          <dl class="faq">
            <dt id="f00"><strong>1. Szacunek dla pozostałych uczestników dyskusji</strong></dt>
            <dd>Nie obrażamy innych użytkowników, szanujemy ich poglądy i uświadamiamy sobie, że każdy ma własne zdanie.</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>
          <hr class="dashed" />
          <dl class="faq">
            <dt id="f01"><strong>2. Kultura wypowiedzi pisemnej</strong></dt>
            <dd>W postach staramy się zachować w.w. kulturę oraz <strong>elementarne</strong> zasady wypowiedzi pisemnej. Nie tłumaczymy się klawiaturą od wujka z Niemiec itp. - <b>pisząc posty używamy polskich znaków</b>; używamy znaków interpunkcyjnych, stawiamy po nich spacje itp.. Jeśli nie wiemy, jak napisać dany wyraz, nawet google potrafi zasugerować nam poprawną formę.</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>
          <hr class="dashed" />
          <dl class="faq">
            <dt id="f02"><strong>3. Dublowanie dyskusji</strong></dt>
            <dd>Przed założeniem tematu sprawdzamy, czy ktoś przypadkiem nie udzielił już odpowiedzi na nurtujące nas pytanie <b> Za nieprzeczytanie FAQ, użytkownik dostaje <b>od razu</b> ostrzeżenie. Dublowane tematy będą kasowane. Jeżeli widzimy zdublowany temat, to takowy raportujemy.</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>
          <hr class="dashed" />
          <dl class="faq">
            <dt id="f03"><strong>4. Nazwy tematów</strong></dt>
            <dd>Zakładając nowy temat staramy się, aby jego nazwa miała związek z poruszaną kwestią (np.: <i>Pomocy</i> to zła nazwa tematu, <i>Problem z drukarką</i> za to wygląda na całkiem konkretnie zadane pytanie i pomoże w rozwiązaniu problemu).</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>
          <hr class="dashed" />
          <dl class="faq">
            <dt id="f06"><strong>5. Cytowanie</strong></dt>
            <dd>Zachowujemy umiar podczas cytowania. Nie cytujemy całych wypowiedzi, a jedynie fragmenty na które odpowiadamy. Kategorycznie nie cytujemy obrazków.</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>
          <hr class="dashed" />
          <dl class="faq">
            <dt id="f08"><strong>6. Adresy stron zewnętrznych</strong></dt>
            <dd>Nie podajemy linków do materiałów mogących naruszać prawa autorskie, warezów, torrentów i innych, co do których nie mamy praw. Zakazane jest również nagminne reklamowanie innych stron (również tych z calkowicie legalną treścią). Każdy link umieszczony w poście powinien być poprzedzony odpowiednim opisem. Posty zawierające wyłącznie linki niepoprzedzone żadnych opisem, co się w nich znajduje, będą usuwane.</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>
          <hr class="dashed" />
          <dl class="faq">
            <dt id="f09"><strong>7. Sygnatury</strong></dt>
            <dd>Staramy się aby rozmiary naszych sygnatur nie przekraczały zbytnio rozsądnej wysokości 110 pikseli, treści zawarte w sygnaturze czy avatarze nie mogą zawierać treści rasistowskich, obrażających religię, wulgarnych, nawołujących do przemocy i innych, uznawanych za niestosowane.</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>
          <hr class="dashed" />
          <dl class="faq">
            <dt id="f010"><strong>8. Konta</strong></dt>
            <dd>Każdy użytkownik może posiadać tylko jedno konto. Wykrycie podszywania się pod wymyślonych użytkowników będzie karane banicją adresu IP na stałe.</dd>
            <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
          </dl>



      </div>
    </section>

  </body>
</html>
