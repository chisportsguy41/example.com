<?php

class Validate {
  public $validation = [];
  public $errors = [];
  public $data = [];

  public function notEmpty($value){
    if(!empty($value)){
      return true;
    }
    return false;
  }

  public function email($value){
    if(filter_var($value, FILTER_VALIDATE_EMAIL)){
      return true;
    }
    return false;
  }

  public function check($data){
    $this->data = $data;

    foreach(array_keys($this->validation) as $fieldName){
      $this->rules($fieldName);
    }
  }

  public function rules($field){
    foreach($this->validation[$field] as $rule){
      if($this->{$rule['rule']}($this->data[$field]) === false){
        $this->errors[$field] = $rule;
      }
    }
  }

public function error($field){
  if(!empty($this->errors[$field])){
    return $this->errors[$field]['message'];
  }

  return false;
  }

public function userInput($field){
  return (!empty($this->data[$field])?$this->data[$field]:null);
  }
}

$message = null;
$valid = new Validate();
$input = filter_input_array(INPUT_POST);

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
    $message = "<div class=\"alert alert-success\">Your form has been submitted!</div>";
    //header('Location: thanks.php');
  }else{
    $message = "<div class=\"alert alert-danger\">Your form has errors!</div>";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous">

  <!--<link rel="stylesheet" type="text/css" href="./dist/css/main.min.css">-->
  <title>Caleb Nordgren</title>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Caleb Nordgren</a>
      <button class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault"
      aria-expanded="false"
      aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="resume.php">Resume</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <main class="container">
  <br><br><br>
  <?php echo $message; ?>
    <div class="jumbotron">
    <h1>Send me an email!</h1>
    <form class="contact-form" action="contact.php" method="POST" novalidate>
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" type="text" name="name"
        value="<?php echo $valid->userInput('name'); ?>">
        <div class="text-danger"><?php echo $valid->error('name');?></div>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" id="email" type="email" name="email"
      value="<?php echo $valid->userInput('email'); ?>">
      <div class="text-danger"><?php echo $valid->error('email');?></div>
    </div>

    <div class="form-group">
      <label for="message">Message</label>
      <textarea class="form-control" id="message" name="message">
      <?php echo $valid->userInput('email'); ?></textarea>
      <div class="text-danger"><?php echo $valid->error('message');?></div>
    </div>

    <div>
      <input type="hidden" name="subject" value="New submission!">
    </div>

    <div>
      <input type="submit" value="Send" class="btn btn-primary">
    </div>

    </form>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>
