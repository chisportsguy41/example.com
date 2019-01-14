<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

// Get the user
$get = filter_input_array(INPUT_GET);
$id = $get['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$id]);
$row = $stmt->fetch();

if(empty($row)){
  http_response_code(404);
  die('Page Not Found <a href="/">Home</a>');
}

$meta=[];
$meta['title']=$row['first_name'] . ' ' . $row['last_name'];

// Update the post
$message = null;
$args = [
  'id'=>FILTER_SANITIZE_STRING,
  'first_name'=>FILTER_SANITIZE_STRING,
  'last_name'=>FILTER_SANITIZE_STRING,
  'email'=>FILTER_SANITIZE_EMAIL,
  'password'=>FILTER_UNSAFE_RAW
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){
  $input = array_map('trim', $input);

  $hashSQL = false;
  if(!empty($input['password'])){
    $password = password_hash($input['password'], PASSWORD_BCRYPT, ['cost'=>14]);
    $hashSQL = ",password='{$password}'";
  }
  $sql = "UPDATE
      users
    SET
      first_name=:first_name,
      last_name=:last_name,
      email=:email
      {$hashSQL}
    WHERE
      id=:id";
  if($pdo->prepare($sql)->execute([
    'first_name'=>$input['first_name'],
    'last_name'=>$input['last_name'],
    'email'=>$input['email'],
    'id'=>$get['id']
  ])){
    header('LOCATION:/users/view.php?id=' . $row['id']);
  }else{
    $message = 'Something bad happened';
  }
}

$content = <<<EOT
<h1>Edit a User</h1>
{$message}
<form method="post">
<input name="id" value="{$row['id']}" type="hidden">
<div class="form-group">
  <label for="first_name">First Name</label>
  <input id="first_name" value="{$row['first_name']}" name="first_name" type="text" class="form-control">
</div>

<div class="form-group">
  <label for="last_name">Last Name</label>
  <input id="last_name" value="{$row['last_name']}" name="last_name" type="text" class="form-control">
</div>

<div class="form-group">
  <label for="email">Email</label>
  <input id="email" value="{$row['email']}" name="email" type="text" class="form-control"></input>
</div>

<div class="form-group">
  <label for="password">Password</label>
  <input id="password" name="password" type="password" class="form-control"></input>
</div>

<div class="form-group">
  <input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>
EOT;

include '../../core/layout.php';
