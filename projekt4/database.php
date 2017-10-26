<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Projekt 4 | Podpowiedzi składni</title>
    <meta charset="UTF-8">
    <meta name="Description" content="Projekt 4 na zajęcia z programowania internetowego: Podpowiedzi składni">
    <meta name="Keywords" content="PW, politechnika, warszawska, programowanie, internetowe, informatyka, projekt, php">
    <meta name="Author" content="Magda Strulak">
    <meta name="Generator" content="JTHTML 8.5">
    <meta name="Robots" content="index">
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/stylemain.css">
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/styleproject4.css">
    <script type="text/javascript" src="ajax.js"></script> 
  </head>
  <body>
    <header>
      <div class="home">
        <a href="http://iem.pw.edu.pl/~strulakm/index.html">
          <img src="http://iem.pw.edu.pl/~strulakm/images/home.png" width="60" height="60" alt="Strona główna" title="Strona główna">
        </a>
      </div>
      <div id="projectname">PROJEKT 4 - Podpowiedzi składni</div>
    </header>

    <article>
       <h3>Podaj login</h3> 
       <br>
       <form id="form" method="post" name="Formularz" >
          <div id="ajax_div">
          <span>Login:</span>
          <input name="login" onkeyup="fun(this.value);" value="<?php echo $_GET['login']; ?>"><br><br>
          <?php 
             if($_GET['imie']!= '')
                echo "<span>Imię:</span>";
          ?>
          <input name="imie" id="imie" value="<?php echo $_GET['imie']; ?>" <?php if($_GET['imie']!= ''){echo "type=\"text\""; echo " readonly=\"readonly\"";}else{echo "type=\"hidden\"";} ?> >
          <?php 
             if($_GET['imie']!= '')
                echo "<span>Nazwisko:</span>";
          ?>
          <input name="nazwisko" id="nazwisko" value="<?php echo $_GET['nazwisko']; ?>" <?php if($_GET['imie']!= ''){echo "type=\"text\""; echo " readonly=\"readonly\"";}else{echo "type=\"hidden\"";}?> >
          </div><br>  
          <div id="baza"></div>
          </form>                 
    </article>

    <footer>
      <div id="name">
        <img src="http://iem.pw.edu.pl/~strulakm/images/author.png" width="35" height="35" alt="Autor" title="O autorze">
        <p>Magda Strulak, 262781</p>
      </div>
      
      <div id="validators">
        <a href="http://validator.w3.org/check?uri=referer">
          <img src="http://dev.bowdenweb.com/a/i/dev/webcomm/badge-w3c-valid-html5.png" height="32" alt="Valid HTML5"></a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
          <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Poprawny CSS!"></a>
      </div>

      <div id="sources">
        <a class="myButton" href="source.php?url=database.php">database.php</a>
        <a class="myButton" href="source.php?url=data.php">data.php</a>
        <a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/projekt4/ajax.js">ajax.js</a>
        <a class="myButton" href="view-source:../css/stylemain">źródło CSS1</a>
        <a class="myButton" href="view-source:../css/styleproject4">źródło CSS2</a>

      </div>
    </footer>   

  </body>
</html>
