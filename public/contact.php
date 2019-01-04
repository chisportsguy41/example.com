<?php
$data = $_POST;

foreach($data as $key => $value){
  echo "{$key} = {$value}<br>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="./dist/css/main.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caleb Nordgren</title>
</head>

<body>
  <header>
    <span class="logo">My Website</span>
    <a id="toggleMenu">Menu</a>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="resume.php">Resume</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Send me an email!</h1>
    <form class="contact-form" action="contact.php" method="POST">
      <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name">
      </div>
      <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email">
      </div>
      <div>
        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>
      </div>
      <div>
        <input type="hidden" name="subject" value="New submission!">
      </div>
      <div>
        <input type="submit" value="Send">
      </div>
    </form>
  </main>
  <script>
    var toggleMenu = document.getElementById('toggleMenu');
    var nav = document.querySelector('nav');
    toggleMenu.addEventListener('click', function () {
      if (nav.style.display == 'block') {
        nav.style.display = 'none';
      } else {
        nav.style.display = 'block';
      }
    });
  </script>
</body>

</html>
