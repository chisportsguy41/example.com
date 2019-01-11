<?php
require '../core/functions.php';

$args = [
  'email'=>FILTER_SANITIZE_EMAIL,
  'password'=>FILTER_UNSAFE_RAW
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)) {
  //Store POST data to password and email vars
  $password = 123;
  $email = 'your@mom.com';

  //DB lookup
  $user = [
    'id'=>123,
    'password'=>123,
    'email'=>'your@mom.com'
  ];

  if(($password===$user['password']) && ($email===$user['email'])) {
    $_SESSION['user'] = $user;
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
