<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

$meta=[];
$meta['title']="Emails";
$meta['description']="Emails received";

$stmt = $pdo->query('SELECT * FROM webforms ORDER BY created DESC');
$content = "<h1>Emails</h1>";

while($row = $stmt->fetch()) {
  $content .= "<div><a href=\"forms/view.php?id={$row['id']}\">From: {$row['name']} - {$row['email']}</a>
  <p>Dated: {$row['created']}</p></div>";
}

$content .= "<br><br><hr><div><a href=\"contact.php\">Send an email!</a></div>";

require '../../core/layout.php';
