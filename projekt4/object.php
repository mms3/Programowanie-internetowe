<?php
class Osoba {
   private $imie;
   private $nazwisko;
   private $pesel;

   function __construct($imie,$nazwisko,$pesel){
      $this->imie = $imie;
      $this->nazwisko = $nazwisko;
      $this->pesel = $pesel;
      echo 'Utworzono nowy obiekt klasy '.get_class($this).'<br>';
   }

   function __destruct(){
      echo 'Usunięto obiekt klasy '.get_class($this).'<br>';
   }

   function __toString(){
      return "Obiekt klasy ".get_class($this).": ".$this->imie." ".$this->nazwisko.", ".$this->pesel;
   }
}

class Student extends Osoba{
   private $ocena;

   function __construct($imie,$nazwisko,$pesel,$ocena){
      Osoba::__construct($imie,$nazwisko,$pesel);
      $this->ocena = $ocena;
   }

   function __destruct(){
      Osoba::__destruct();
   }

   function __toString(){
      return Osoba::__toString(). ", " .$this->ocena;
   }   
}

?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Projekt 4 | PHP: Programowanie obiektowe</title>
    <meta charset="UTF-8">
    <meta name="Description" content="Projekt 4 na zajęcia z programowania internetowego: PHP - Programowanie obiektowe">
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
      <div id="projectname">PROJEKT 4 - Programowanie obiektowe</div>
    </header>

    <article>
       <h3>Utworzenie obiektów</h3>
       <div class=part>
          <?php
          $osoba = new Osoba('Jan','Kowalski', 1991111111111);
          $student = new Student ('Piotr','Nowak',1990010100000,5);
          echo "<br>";
          ?>
       </div>
       <h3>Wypisanie obiektów</h3>
       <div class=part>
          <?php
          echo $osoba."<br>";
          echo $student."<br>";
          ?>
       </div>
       <h3>Serializacja</h3>
       <div class=part>
          <?php
          $serializeOsoba = serialize($osoba);
          $serializeStudent = serialize($student);
          echo $serializeOsoba."<br><br>";
          echo $serializeStudent."<br><br>";
          ?>
       </div>
       <h3>Deserializacja</h3>
       <div class=part>
          <?php
          $deserializeOsoba = unserialize($serializeOsoba);
          $deserializeStudent = unserialize($serializeStudent);
          echo $deserializeOsoba."<br>";
          echo $deserializeStudent."<br><br>";
          ?>
       </div>
       <h3>Usuwanie obiektów</h3>
       <div class=part>
          <?php
          echo $osoba." - ";
          unset($osoba);
          echo $student." - ";
          unset($student);
          echo $deserializeOsoba." - ";
          unset($deserializeOsoba);
          echo $deserializeStudent." - ";
          unset($deserializeStudent);
          echo "<br>";
          ?>
       </div>
       
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
        <a class="myButton" href="source.php?url=object.php">object.php</a>
        <a class="myButton" href="view-source:../css/stylemain">źródło CSS1</a>
        <a class="myButton" href="view-source:../css/styleproject4">źródło CSS2</a>
      </div>
    </footer>   

  </body>
</html>
