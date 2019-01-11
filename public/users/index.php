<?php
require '../../core/functions.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

$meta=[];
$meta['title']="Users";
$meta['description']="Users";

$stmt = $pdo->query('SELECT * FROM users ORDER BY last_name');
$content = "<h1>Users</h1>";

while($row = $stmt->fetch()) {
  $content .= "<div><a href=\"users/view.php?id={$row['id']}\">{$row['last_name']}, {$row['first_name']}</a></div>";
}

$content .= "<br><br><hr><div><a href=\"users/add.php\">Add New User</a></div>";

require '../../core/layout.php';
