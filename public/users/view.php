<?php

require '../../config/keys.php';

require '../../core/db_connect.php';

$input = filter_input_array(INPUT_GET);
$id = preg_replace("/[^a-z0-9-]+/","",$input['id']);
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$id]);
$row = $stmt->fetch();

$meta=[];
$meta['title']=$row['first_name'] . ' ' . $row['last_name'];

$content = <<<EOT
<h1>{$row['first_name']} {$row['last_name']}</h1>
{$row['email']}

<hr>
<div>
  <a class="btn btn-link" href="users/edit.php?id={$row['id']}">Edit</a>
  <a class="btn btn-link text-danger" href="users/delete.php?id={$row['id']}">Delete</a>
</div>
EOT;

require '../../core/layout.php';
