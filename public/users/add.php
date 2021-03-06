<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

$meta=[];
$meta['title']="Add New User";

$message = null;
$args = [
  'first_name'=>FILTER_SANITIZE_STRING,
  'last_name'=>FILTER_SANITIZE_STRING,
  'email'=>FILTER_SANITIZE_EMAIL,
  'password'=>FILTER_UNSAFE_RAW
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){
  $input = array_map('trim', $input);
  $password = password_hash($input['password'], PASSWORD_BCRYPT, ['cost'=>14]);
  $sql = 'INSERT INTO
      users
    SET
      id=uuid(),
      first_name=:first_name,
      last_name=:last_name,
      email=:email,
      password=:password';
  if($pdo->prepare($sql)->execute([
    'first_name'=>$input['first_name'],
    'last_name'=>$input['last_name'],
    'email'=>$input['email'],
    'password'=>$password
  ])){
    header('LOCATION:/users/');
  }else{
    $message = 'Something bad happened';
  }
}

$content = <<<EOT
<h1>Add a New User</h1>
{$message}
<form method="post">

<div class="form-group">
  <label for="first_name">First Name</label>
  <input id="first_name" name="first_name" type="text" class="form-control">
</div>

<div class="form-group">
  <label for="last_name">Last Name</label>
  <input id="last_name" name="last_name" type="text" class="form-control"></input>
</div>

<div class="form-group">
  <label for="email">Email</label>
  <input id="email" name="email" type="text" class="form-control"></input>
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
