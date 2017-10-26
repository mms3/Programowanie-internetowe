<?php
sleep(1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   echo 'POST: ';
   print_r($_POST[sync]);
} else {
   echo 'GET: ';
   print_r($_GET[sync]);
}
?>
