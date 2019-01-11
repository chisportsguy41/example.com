<?php
$hasSession = false;

if(!empty($_SESSION['user']['id'])) {
  $hasSession = true;
}

if($hasSession===false) {
  header('Location: /login.php');
}

