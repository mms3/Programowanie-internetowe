<?php session_start(); 
   if($_SESSION['logged']!=true){
      header('Location: login.php?action=not_logged');
      exit;
   }

   if($_POST){ 
        $_SESSION['firstname'] = $_POST['firstname']; 
        $_SESSION['lastname'] = $_POST['lastname']; 
        $_SESSION['birthdate'] = $_POST['birthdate']; 
        $_SESSION['pesel'] = $_POST['pesel']; 
        $_SESSION['age'] = $_POST['age']; 
        $_SESSION['sex']= $_POST['sex']; 
        $_SESSION['study'] = $_POST['study']; 
        $_SESSION['uploadfile'] = $_POST['uploadfile']; 
        $_SESSION['comment'] = $_POST['comment']; 
        $_SESSION['agreed'] = $_POST['agreed']; 
        header('Location: info.php'); 
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
    <script src="http://iem.pw.edu.pl/~strulakm/projekt2/form.js"></script>
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/tcal.css">
	  <script src="http://iem.pw.edu.pl/~strulakm/projekt2/tcal.js"></script> 
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
      <h1>Formularz</h1>
      
      <form id="form" action="#" onsubmit="return(check_form());" method="post">
			<div>
				<label>*Imię:</label>
        <input id="firstname" name="firstname" type="text" required><br>
			</div><br>
      <div>
				<label>*Nazwisko:</label>
        <input id="lastname" name="lastname" type="text" required><br>
			</div><br>
      <div>
				<label>*Data urodzenia:</label>
        <input id="birthdate" name="birthdate" type="text" class="tcal" placeholder="yyyy-mm-dd" onchange="countAge()" required><br>
			</div><br>
      <div>
				<label>PESEL:</label>
        <input id="pesel" name="pesel" type="text"><br>
			</div><br>
      <div>
				<label>Wiek:</label>
        <input id="age" name="age" type="text" readonly><br>
			</div><br>
      <div>
        <label>Płeć:</label>
        <select id="sex" name="sex">
          <option selected="selected"></option>
          <option>Mężczyzna</option>
          <option>Kobieta</option>
        </select>
      </div><br>
      <div>
        <label>Kierunek studiów:<br><br><br></label>
        <input type="radio" name="study" value="Automatyka i robotyka"><span class="normal">Automatyka i Robotyka</span><br>
        <input type="radio" name="study" value="Elektrotechnika"><span class="normal">Elektrotechnika</span><br>
        <input type="radio" name="study" value="Informatyka"><span class="normal">Informatyka</span><br>
      </div><br>
      <div>
				<label>Plik (jpg, tif, png): </label>
        <input id="uploadfile" name="uploadfile" type="file" accept="image/tif, image/jpeg, image/png"><br>
			</div><br>
      <div>
				<label>Komentarz:</label><br>
        <textarea rows="5" cols="40" name="comment" id="comment" onkeyup="countChars(300)" onkeypress="countChars(300)"></textarea><br>
        <span class="normal">Pozostało znaków:</span>
        <input type=text readonly name="charsLeft" id="charsLeft" value="300">
			</div><br>
      <div>
				<input type="checkbox" id="agreed" name="agreed"><span id="italic">*Wyrażam zgodę na przetwarzanie danych osobowych</span><br>
			</div><br>
				<br><input type="submit" value="Wyślij">
			</form>
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
        <a class="myButton" href="source.php?url=form.php">form.php</a>
	<a class="myButton" href="source.php?url=logout.php">logout.php</a>
        <a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/css/stylemain.css">Źródło CSS1</a>
        <a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/css/styleproject2.css">Źródło CSS2</a>
	<a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/projekt2/form.js">Źródło JS</a>
      </div>
    </footer>

    <div id="note">Programowanie internetowe</div>   

  </body>
</html>
