<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

$args = [
  'id'=>FILTER_UNSAFE_RAW,
  'confirm'=>FILTER_VALIDATE_INT
];

$input = filter_input_array(INPUT_GET);
$id = $input['id'];
$stmt = $pdo->prepare("SELECT * FROM webforms WHERE id=:id");
$stmt->execute(['id'=>$id]);
$row = $stmt->fetch();

if(!empty($input['confirm'])) {
  $stmt = $pdo->prepare("DELETE FROM webforms WHERE id=:id");
  if($stmt->execute(['id'=>$id])){
    header('LOCATION: /forms/');
  }
}

$meta=[];
$meta['title']="DELETE: Email from {$row['name']}";

$content = <<<EOT
<h1 class="text-danger text-center">DELETE: Email from {$row['name']}</h1>
<p class="text-danger text-center">Are you sure you want to delete?</p>

<div class="text-center">
  <a href="forms/" class="btn btn-success btn-lg">Cancel</a>
  <br><br>
  <a href="forms/delete.php?id={$row['id']}&confirm=1" class="btn btn-link text-danger">Delete</a>
</div>
EOT;

require '../../core/layout.php';
