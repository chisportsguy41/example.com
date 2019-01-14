<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

$input = filter_input_array(INPUT_GET);
$id = preg_replace("/[^a-z0-9-]+/","",$input['id']);
$stmt = $pdo->prepare("SELECT * FROM webforms WHERE id=:id");
$stmt->execute(['id'=>$id]);
$row = $stmt->fetch();

$meta=[];
$meta['title']= 'Email from: ' . $row['name'];
$meta['description']= 'Email from ' . $row['name'];

$content = <<<EOT
<h1>Email from: {$row['name']}</h1>
<a><em>{$row['email']}</em></a>
<hr>
<p>{$row['message']}</p>

<hr>
<div>
  <a class="btn btn-link text-danger" href="forms/delete.php?id={$row['id']}">Delete</a>
</div>
EOT;

require '../../core/layout.php';
