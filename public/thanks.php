<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="./dist/css/main.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank you!</title>
</head>

<body>
  <main>
    <h1>Thank you for your submission!</h1>
    <p>Someone will be in touch in 3-5 business days, probably.</p>
  </main>
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
  <script>
    var toggleMenu = document.getElementById('toggleMenu');
    var nav = document.querySelector('nav');
    toggleMenu.addEventListener(
      'click',
      function () {
        if (nav.style.display == 'block') {
          nav.style.display = 'none';
        } else {
          nav.style.display = 'block';
        }
      }
    );
  </script>
</body>

</html>
