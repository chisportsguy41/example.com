<?php
require '../../core/functions.php';

require '../../config/keys.php';

require '../../core/db_connect.php';

$input = filter_input_array(INPUT_GET);
$id = preg_replace("/[^a-z0-9-]+/","",$input['id']);
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$id]);
$row = $stmt->fetch();

$list = null;
$stmt2 = $pdo->prepare("SELECT * FROM posts WHERE user_id=:user_id ORDER BY created DESC");
$stmt2->execute(['user_id'=>$id]);
while($row2 = $stmt2->fetch()) {
  $list .= "<li><a href=\"posts/view.php?slug={$row2['slug']}\">{$row2['title']}</a></li>";
}

if(empty($list)) {
  $list = "<li>This user hasn't written anything yet.</li>";
}

$meta=[];
$meta['title']=$row['first_name'] . ' ' . $row['last_name'];

$content = <<<EOT
<h1>{$row['first_name']} {$row['last_name']}</h1>
<p>{$row['email']}</p>
<br>
<h3>Posts</h3>
<ul>
  {$list}
</ul>
<hr>
<div>
  <a class="btn btn-link" href="users/edit.php?id={$row['id']}">Edit</a>
  <a class="btn btn-link text-danger" href="users/delete.php?id={$row['id']}">Delete</a>
</div>
EOT;

require '../../core/layout.php';
