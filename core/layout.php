<?php

function active($name) {
  $current = $_SERVER['REQUEST_URI'];
  if($current === $name) {
    return 'active';
  }

  return null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="/">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous">

  <!--<link rel="stylesheet" type="text/css" href="./dist/css/main.min.css">-->
  <?php if(!empty($meta)): ?>
    <?php if(!empty($meta['title'])): ?>
      <title><?php echo $meta['title'];?></title>
    <?php endif; ?>
    <?php if(!empty($meta['description'])): ?>
      <meta name="description" content="<?php echo $meta['description']; ?>">
    <?php endif; ?>
    <?php if(!empty($meta['keywords'])): ?>
      <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
    <?php endif; ?>
  <?php endif; ?>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">Caleb Nordgren</a>
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
          <a class="nav-link <?php echo active('/');?>" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active('/resume.php');?>" href="/resume.php">Resume</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active('/contact.php');?>" href="/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active('/posts/');?>" href="posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active('/users/');?>" href="users">Users</a>
        </li>
        <?php if(!empty($_SESSION['user']['id'])):?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']?></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="users/view.php?id=<?php echo $_SESSION['user']['id']?>">Profile</a>
                <a class="dropdown-item" href="posts/add.php">New Post</a>
                <a class="dropdown-item" href="logout.php">Log Out</a>
              </div>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link <?php echo active('/login.php'); ?>" href="login.php">Login</a>
        <?php endif;?>
        </li>
      </ul>
    </div>
  </nav>
  <main class="container">
    <div class="jumbotron">
    <?php echo $content;?>
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
