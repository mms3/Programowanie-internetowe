<?php
header("Acess-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$con = mysqli_connect('localhost','strulakm','');
if (!$con) 
   die('Could not connect: ' . mysqli_error($con)); 

mysqli_select_db($con,"test"); 
$sql="SELECT * FROM  proj4_users WHERE login LIKE '%$_GET[login]%'"; 
$result = mysqli_query($con,$sql); 

if ($_GET[login] != ""){
   while($row = mysqli_fetch_array($result)) {
      $outp = $row['login'].'<br>';
      $login = $row['login'];
      $name = $row['name'];
      $surname = $row['surname'];
      $link = "database.php?&login=$login&imie=$name&nazwisko=$surname";
      echo "<a class=\"listel\" href='".$link."'>$outp</a>";
   } 
}
mysqli_close($con);
?>
