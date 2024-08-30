<?php
$title = "INTPROG Activity 2";
$groupName = "IT3P Integrative Programming - Group 3";
$members = [
    [
        "name" => "Orly Pantaleon",
        "image" => "images/orly.jpg",
        "alt" => "Orly",
        "description" => "Hi, my name is Orly Pantaleon! I live in Poblacion, Muntinlupa City and study in Pamantasan Lungsod ng Muntinlupa. I'm in my 3rd year now and I love cats and dogs. I am cheerful and trustworthy.",
        "class" => ""
    ],
    [
        "name" => "Tristan Beldad",
        "image" => "images/tan.jpg",
        "alt" => "Tristan",
        "description" => "Hello everyone! My name is Tristan Dave A. Beldad, and I’m currently a 3rd Year College at Pamantasan Ng Lungsod Ng Muntinlupa taking a bachelor course in Information Technology. I’m passionate about technology and I’m excited to explore more in this field. Outside of academics, I enjoy playing games and I'm looking forward to making lasting connections and sharing experiences with all of you.",
        "class" => "darker1"
    ],
    [
        "name" => "William Se",
        "image" => "images/se.jpg",
        "alt" => "William",
        "description" => "Hello everyone, I'm William Se, a 3rd year college student at Pamantasan Lungsod ng Muntinlupa. I have a passion for technology and enjoy exploring the latest in software development. I love coffee craft and gaming, which gives me a great balance between the digital and natural worlds. I'm looking forward to meeting new people, learning as much as I can.",
        "class" => ""
    ],
    [
        "name" => "James Andrade",
        "image" => "images/james.jpg",
        "alt" => "James",
        "description" => "Greetings to everyone, My name is James Ronel E. Andrade, an average person who wants an average life but also wants a stable living. I am a regular student who pursues BSIT currently studying at PLMun. I'm residing in Brgy.San Antonio, San Pedro, Laguna which has a 1 hour away from my school. I love listening to music, playing it on my guitar, watching animes and also sleeping. I wanted to learn deeper more on technologies and computer so that it can help for the future job that i want to take.",
        "class" => "darker2"
    ],
    [
        "name" => "Jayson Parro",
        "image" => "images/toni.jpg",
        "alt" => "Jayson",
        "description" => "Hello! My name is Jayson Carl Parro, and I am a student at PLMun. I am currently studying under the BSIT course. My primary interests include building or coding, and I am excited to connect with others who share similar interests or who can offer new insights.",
        "class" => ""
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <style>
    body {
      margin: 0px;
      font-family: Arial;
    }

    header {
      background-color: darkgoldenrod;
    }

    h1 {
      margin: 0px;
      padding: 20px;
      display: inline-block;
      color: white;
    }

    header button {
      float: right;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      margin: 20px;
    }

    .container {
      width: 20%;
      float: left;
      display: inline-block;
      text-align: center;
    }

    .container h3 {
      padding: 0px 8px;
    }

    .container p {
      padding: 0px 10px;
    }

    .darker1, .darker2 {
      background-color: lightgray;
    }

    img {
      width: 8em;
      height: 8em;
      border: 5px solid darkgoldenrod;
    }

    footer {
      background-color: darkgoldenrod;
      color: white;
      display: inline-block;
      text-align: center;
      width: 100%;
    }

    h4 {
      margin: 1em 0px;
    }

    .light-mode {
      background-color: lightgray;
      color: gray;
    }

    .dark-mode {
      background-color: dimgray;
      color: lightgray;
    }
  </style>
</head>
<body>
  <header>
    <h1>Mga Manggi</h1>
    <button class="light-mode">Light Mode</button>
    <button class="dark-mode">Dark Mode</button>
  </header>

  <section id="members">
    <?php foreach ($members as $member): ?>
    <div class="container <?php echo $member['class']; ?>">
      <h3><?php echo $member['name']; ?></h3>
      <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['alt']; ?>">
      <p><?php echo $member['description']; ?></p>
    </div>
    <?php endforeach; ?>
  </section>

  <footer>
    <h4><?php echo $groupName; ?></h4>
  </footer>

  <script>
    const lightButton = document.querySelector('.light-mode');
    const darkButton = document.querySelector('.dark-mode');
    const darkerDiv1 = document.querySelector('.darker1');
    const darkerDiv2 = document.querySelector('.darker2');
    const paragraphs = document.querySelector('#members');
    const body = document.body;

    lightButton.addEventListener('click', () => {
      body.style.backgroundColor = 'white';
      paragraphs.style.color = "black";
      darkerDiv1.style.backgroundColor = "lightgray";
      darkerDiv2.style.backgroundColor = "lightgray";
    });

    darkButton.addEventListener('click', () => {
      body.style.backgroundColor = 'gray';
      paragraphs.style.color = "white";
      darkerDiv1.style.backgroundColor = "dimgray";
      darkerDiv2.style.backgroundColor = "dimgray";
    });
  </script>
</body>
</html>
