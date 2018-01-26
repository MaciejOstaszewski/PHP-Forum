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
    <link rel="stylesheet" href="styles/fontello/fontello.css">
    <link rel="stylesheet" href="styles/rules_style.css" type="text/css" />
    <title></title>
  </head>
  <body>
    <header>
      <a href="#" class="scrollup"><i class="icon-angle-circled-up"></i></a>
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
      <div class="content">
  <h2>Problemy Logowania i Rejestracji</h2>

    <dl class="faq">
      <dt id="f00"><strong>Dlaczego nie mogę się zalogować?</strong></dt>
      <dd>Powodów tego może być kilka. Po pierwsze, upewnij się, że podajesz prawidłowy login i hasło. Jeśli są prawidłowe to być może zostałeś wyrzucony z forum (aby się upewnić skontaktuj się z administratorem). Możliwe jest także, że problem leży w błędnej konfiguracji forum.</dd>
      <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
    </dl>
    <hr class="dashed" />
    <dl class="faq">
      <dt id="f01"><strong>Dlaczego muszę się zarejestrować?</strong></dt>
      <dd>Być może nie musisz, zależy to od administratora forum czy rejestracja jest konieczna aby móc pisać wiadomości. Jednakże rejestracja umożliwi Ci dostęp do dodatkowych opcji niedostępnych dla gości takich jak prywatne wiadomości, wysyłanie maili do użytkowników, możliwość dołączenia awatara, subskrypcja grup użytkowników itd. Rejestracja zajmie Ci chwilę więc zachęcamy abyś jej dokonał.</dd>
      <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
    </dl>
    <hr class="dashed" />
    <dl class="faq">
      <dt id="f02"><strong>Dlaczego jestem automatycznie wylogowywany?</strong></dt>
      <dd>Jeżeli nie zaznaczysz opcji <em>Zaloguj mnie automatycznie przy każdej wizycie</em> podczas logowania będziesz zalogowany na forum tylko podczas tej wizyty. Uniemożliwia to korzystania z Twojego konta przez kogoś innego. Aby pozostawać zalogowanym przy kolejnych wizytach zaznacz powyższą opcję.  Nie jest to zalecane, gdy korzystasz z ogólnodostępnego komputera, np. w bibliotece, kawiarni internetowej czy na uczelni. Jeżeli nie widzisz tej opcji podczas logowania oznacza to, że administrator ją wyłączył.</dd>
      <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
    </dl>
    <hr class="dashed" />

    <dl class="faq">
      <dt id="f04"><strong>Zapomniałem hasła!</strong></dt>
      <dd>Nie martw się! Jeśli twoje hasło nie może byc odzyskane, istnieje możliwość zresetowania go. Aby zrobić to przejdź do strony logowania i kliknij na <em>Zapomniałem hasła</em> a następnie postępuj zgodnie ze wskazówkami.</dd>
      <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
    </dl>
    <hr class="dashed" />

    <dl class="faq">
      <dt id="f06"><strong>Zarejestrowałem się kiedyś, ale nie mogę się już zalogować!</strong></dt>
      <dd>Prawdopodobny powód tego to: wprowadzasz błędna nazwę użytkownika lub hasło (sprawdź e-mail, który otrzymałeś po rejestracji) lub Twoje konto zostało usunięte przez administratora z jakiegoś powodu. Jeżeli Twoje konto zostało usunięte to być może nie pisałeś żadnych postów na forum? Zazwyczaj na forach okresowo usuwa się użytkowników, którzy nie napisali żadnego postu aby zmniejszyć rozmiar bazy danych. Spróbuj ponownie zarejestrować się i włączyć do dyskusji na forum.</dd>
      <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
    </dl>
    <hr class="dashed" />

    <dl class="faq">
      <dt id="f08"><strong>Dlaczego nie mogę się zarejestrować?</strong></dt>
      <dd>Prawdopodobnie właściciel strony zbanował Twój adres IP lub zabronił nazwy użytkownika, której próbujesz użyć przy rejestracji. Skontaktuj się z administratorem forum w celu uzyskania pomocy.</dd>
      <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->
    </dl>
    <hr class="dashed" />
    <dl class="faq">
      <dt id="f09"><strong>Co spowoduje "Usunięcie wszystkich cookies utworzonych przez forum"?</strong></dt>
      <dd>“Usuń cookies utworzone przez forum” usuwa cookies utworzone przez phpBB3, które pozwalają na zapamiętanie Twoich ustawień i bycie zalogowanym na forum. Dzięki nim działają również takie funkcje, jak zapamiętywanie nieprzeczytanych postów. Usunięcie cookies może pomóc w przypadku problemów z zalogowaniem lub wylogowaniem się.</dd>
    </dl>
    <!-- <dd><a href="#faqlinks" class="top2">Góra</a></dd> -->

</div>
    </section>
  </body>
</html>
