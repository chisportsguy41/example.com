<?php
require 'Caleb/src/validation/validate.php';

use Caleb\Validation;

$message = null;
$valid = new Caleb\Validation\Validate();
$args = [
  'name'=>FILTER_SANITIZE_STRING,
  'subject'=>FILTER_SANITIZE_STRING,
  'message'=>FILTER_SANITIZE_STRING,
  'email'=>FILTER_SANITIZE_EMAIL,
];
$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){
  $valid->validation = [
    'email'=>[[
      'rule'=>'email',
        'message'=>'Please enter a valid email'
      ],[
      'rule'=>'notEmpty',
        'message'=>'Please enter an email'
    ]],
    'name'=>[[
      'rule'=>'notEmpty',
      'message'=>'Please enter your first name'
    ]],
    'message'=>[[
      'rule'=>'notEmpty',
      'message'=>'Please add a message'
    ]],
  ];

  $valid->check($input);
  if(empty($valid->errors)){
    $sql = 'INSERT INTO
      webforms
    SET
      id=uuid(),
      name=:name,
      message=:message,
      email=:email';
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([
      $input['name'],
      $input['message'],
      $input['email']
    ])){
      header('Location: thanks.php');
    } else {
      $message = 'Something bad happened';
    }
  } else {
    $message = "<div class=\"alert alert-danger\">Your form has errors!</div>";
  }
}
