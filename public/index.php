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
    <h1>Hello, I am Caleb Nordgren</h1>
    <img class="avatar" src="https://www.gravatar.com/userimage/26496479/d906b6b11145246cd46e22b16742e46e?size=120" alt="Caleb Nordgren">
    <p>I am a human being who exists. I have nothing else to say at the present time. I am a human being who exists. I
      have nothing else to say at the present time. I am a human being who exists. I have nothing else to say at the
      present time. I am a human being who exists. I have nothing else to say at the present time. I am a human being
      who exists. I have nothing else to say at the present time. I am a human being who exists. I have nothing else to
      say at the present time. I am a human being who exists. I have nothing else to say at the present time. I am a
      human being who exists. I have nothing else to say at the present time. I am a human being who exists. I have
      nothing else to say at the present time. I am a human being who exists. I have nothing else to say at the present
      time. I am a human being who exists. I have nothing else to say at the present time. I am a human being who
      exists. I have nothing else to say at the present time. I am a human being who exists. I have nothing else to say
      at the present time. I am a human being who exists. I have nothing else to say at the present time. I am a human
      being who exists. I have nothing else to say at the present time. I am a human being who exists. I have nothing
      else to say at the present time. </p>
  </main>
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
