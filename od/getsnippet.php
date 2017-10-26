<?php
 $plik = fopen('snippets.txt','a');
 fwrite($plik, $_GET["x"] . "\n");
 ?>
