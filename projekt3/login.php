<?php session_start();
   if($_SESSION['logged']){
      header('Location: form.php');
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
      <div id="projectname">PROJEKT 3 - PHP: Logowanie</div>
    </header>

    <article>
       <h2>Zaloguj się</h2>
       <?php
          if($_GET['action']=='not_logged'){
             $message = "Zaloguj się, aby przejść dalej";
             echo '<div class="message">'.$message.'</div>';
             echo ("<br>");
          }

          if($_GET['action']=='logged_out'){
             session_destroy();
          }	
          
          if($_POST){
             $user = "student";
             $password = "zet";

             if($_POST['user']==$user && $_POST['password']==$password){
                $_SESSION['logged']=true;
                header('Location: form.php');
             } else {
                $message = "Nieprawidłowy login lub hasło";
                echo '<div class="message">'.$message.'</div>';
                echo ("<br>");
             }
          }
       ?>
       <div id="form">
          <form id="loginform" action="login.php" method="post">
            <div>
               <label>Login:</label>
               <input id="user" name="user" type="text"><br>
			      </div><br>
            <div>
				       <label>Hasło:</label>
               <input id="password" name="password" type="password"><br>
			      </div><br>
            <br><input type="submit" value="Wyślij">
          </form>
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
	<a class="myButton" href="source.php?url=login.php">login.php</a>
        <a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/css/stylemain.css">Źródło CSS1</a>
        <a class="myButton" href="view-source:http://iem.pw.edu.pl/~strulakm/css/styleproject3.css">Źródło CSS2</a>
      </div>
    </footer>   

  </body>
</html>
