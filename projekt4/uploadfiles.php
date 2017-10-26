<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Projekt 4 | PHP: Zarządzanie plikami</title>
    <meta charset="UTF-8">
    <meta name="Description" content="Projekt 4 na zajęcia z programowania internetowego: PHP - Zarządzanie przesyłanymi plikami">
    <meta name="Keywords" content="PW, politechnika, warszawska, programowanie, internetowe, informatyka, projekt, php">
    <meta name="Author" content="Magda Strulak">
    <meta name="Generator" content="JTHTML 8.5">
    <meta name="Robots" content="index">
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/stylemain.css">
    <link rel="stylesheet" type="text/css" href="http://iem.pw.edu.pl/~strulakm/css/styleproject4.css">
  </head>
  <body>
    <header>
      <div class="home">
        <a href="http://iem.pw.edu.pl/~strulakm/index.html">
          <img src="http://iem.pw.edu.pl/~strulakm/images/home.png" width="60" height="60" alt="Strona główna" title="Strona główna">
        </a>
      </div>
      <div id="projectname">PROJEKT 4 - Zarządzanie plikami</div>
    </header>

    <article>
       <h3>Prześlij trzy pliki</h3> 
       
       <?php
       if(isset($_FILES['plik1']['name']) && isset($_FILES['plik2']['name']) && isset($_FILES['plik3']['name'])) {
          if (!empty($_FILES['plik1']['name']) && !empty($_FILES['plik2']['name']) && !empty($_FILES['plik3']['name'])) {
             move_uploaded_file($_FILES['plik1']['tmp_name'], "uploads/".$_FILES['plik1']['name']);
             chmod("uploads/".$_FILES['plik1']['name'],0777);
             move_uploaded_file($_FILES['plik2']['tmp_name'], "uploads/".$_FILES['plik2']['name']);
             chmod("uploads/".$_FILES['plik2']['name'],0777);
             move_uploaded_file($_FILES['plik3']['tmp_name'], "uploads/".$_FILES['plik3']['name']);
             chmod("uploads/".$_FILES['plik3']['name'],0777);
             $message = "Przesłano pliki pomyślnie";
             echo '<div class="message">'.$message.'</div>';
             echo ("<br>");       
          } else {
             $message = "Trzeba wybrać trzy pliki";
             echo '<div class="errormessage">'.$message.'</div>';
             echo ("<br>");
          }
       } else {
          $message = "Błąd podczas przesylania danych";
          echo '<div class="errormessage">'.$message.'</div>';
          echo ("<br>");
       }
       ?>
       <div class="back"><a href="http://volt.iem.pw.edu.pl/~strulakm/projekt4/upload.php">Powrót</a></div>
       
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
        <a class="myButton" href="source.php?url=uploadfiles.php">uploadfiles.php</a>
        <a class="myButton" href="view-source:../css/stylemain">źródło CSS1</a>
        <a class="myButton" href="view-source:../css/styleproject4">źródło CSS2</a>
      </div>
    </footer>   

  </body>
</html>

