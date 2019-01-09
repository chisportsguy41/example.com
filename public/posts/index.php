<?php

require '../../core/db_connect.php';
$meta=[];
$meta['title']="Read my words, please";
$meta['description']="Blog Posts";

$stmt = $pdo->query('SELECT * FROM posts');
$content = "<h1>Read my words, please</h1>";

while($row = $stmt->fetch()) {
  $content .= "<a href=\"posts/view.php?slug={$row['slug']}\">{$row['title']}</a>";
}

require '../../core/layout.php';
