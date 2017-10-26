<?php session_start(); 
  if($_SESSION['logged']!=true){
      header('Location: login.php?action=not_logged');
      exit;
   }
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Projekt 3 | PHP: Logowanie</title>
    <meta charset="UTF-8">
    <meta name="Description" content="Projekt 3 na zajęcia z programowania internetowego: PHP - Logowanie">
    <meta name="Keywords" content="PW, politechnika, warszawska, programowanie, internetowe, informatyka, projekt, php, login, logowanie">
    <meta name="Author" content="Magda Strulak">
    <meta name="Generator" content="JTHTML 8.5">
    <meta name="Robots" content="index">
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/stylemain.css">
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/styleproject2.css">
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/styleproject3.css">
  </head>
  <body>
    <header>
      <div class="home">
        <a href="http://iem.pw.edu.pl/~strulakm/index.html">
          <img src="http://iem.pw.edu.pl/~strulakm/images/home.png" width="60" height="60" alt="Strona główna" title="Strona główna">
        </a>
      </div>
      <div id="projectname">PROJEKT 3 - PHP: LOGOWANIE</div>
    </header>

    <article>
      <h1>Podane dane</h1>
      <div id="results">
        <div class="result">
           <div class="resultname">Imię</div>
           <div class="resultvalue"><?php echo $_SESSION['firstname']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">Nazwisko</div>
           <div class="resultvalue"><?php echo $_SESSION['lastname']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">Data urodzenia</div>
           <div class="resultvalue"><?php echo $_SESSION['birthdate']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">PESEL</div>
           <div class="resultvalue"><?php echo $_SESSION['pesel']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">Wiek</div>
           <div class="resultvalue"><?php echo $_SESSION['age']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">Płeć</div>
           <div class="resultvalue"><?php echo $_SESSION['sex']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">Kierunek studiów</div>
           <div class="resultvalue"><?php echo $_SESSION['study']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">Załączony plik</div>
           <div class="resultvalue"><?php echo $_SESSION['uploadfile']; ?></div>
        </div>
        <div class="result">
           <div class="resultname">Komentarz</div>
           <div class="resultvalue"><?php echo $_SESSION['comment']; ?></div>
        </div>
      </div>

      <a href="logout.php">Wyloguj</a>

    </article>

    <footer>
      <div id="name">
        <img src="http://iem.pw.edu.pl/~strulakm/images/author.png" width="35" height="35" alt="Autor" title="O autorze">
        <p>Magda Strulak, 262781</p>
      </div>
      
      <div id="validators">
        <a href="http://validator.w3.org/check?uri=referer">
          <img src="http://dev.bowdenweb.com/a/i/dev/webcomm/badge-w3c-valid-html5.png" height="32" alt="Valid HTML5"></a>
        <a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fvolt.iem.pw.edu.pl%2F~strulakm%2Fcss%2Fstyleproject2.css">
          <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Poprawny CSS!"></a>
      </div>

      <div id="sources">
        <a class="myButton" href="source.php?url=info.php">info.php</a>
	<a class="myButton" href="source.php?url=logout.php">logout.php</a>
        <a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/css/stylemain.css">Źródło CSS1</a>
        <a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/css/styleproject3.css">Źródło CSS2</a>
      </div>
    </footer>

    <div id="note">Programowanie internetowe</div>   

  </body>
</html>
