<?php

require '../../config/keys.php';

require '../../core/db_connect.php';
$meta=[];
$meta['title']="Read my words, please";
$meta['description']="Blog Posts";

$stmt = $pdo->query('SELECT * FROM posts');
$content = "<h1>Read my words, please</h1>";

while($row = $stmt->fetch()) {
  $content .= "<div><a href=\"posts/view.php?slug={$row['slug']}\">{$row['title']}</a></div>";
}

$content .= "<br><br><hr><div><a href=\"posts/add.php\">Add New Post</a></div>";

require '../../core/layout.php';
