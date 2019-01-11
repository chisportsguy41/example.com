<?php
require '../core/functions.php';
require '../config/keys.php';
require '../core/db_connect.php';

$args = [
  'email'=>FILTER_SANITIZE_EMAIL,
  'password'=>FILTER_UNSAFE_RAW
];

//Store POST data $input array
$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)) {
  //DB lookup
  $sql = 'SELECT * FROM users WHERE email = :email';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['email'=>$input['email']]);
  $row = $stmt->fetch();

  if($input['email'] === $row['email']) {
    $_SESSION['user'] = $row;
    header('LOCATION: /');
  }

}

$content = <<<EOT
<h1>Please log in</h1>
<form method="post">

<div class="form-group">
  <label for="email">Email</label>
  <input id="email" name="email" type="text" class="form-control">
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

include '../core/layout.php';