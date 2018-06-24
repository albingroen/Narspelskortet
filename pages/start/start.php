<!-- <?php
 if(!empty($_SESSION['user'])){
   echo $_SESSION['user'] , " är inloggad";
  }
?> -->

<nav>
  <ul>
    <?php 
      if(!isset($_SESSION['user'])){
        echo "<li><a href=index.php?pageid=login>Logga in</a></li><li><a href=index.php?pageid=register>Registrera</a></li>";
      } else {
        echo "<li><a href=index.php?pageid=start&logout=TRUE>Logga ut</a></li>";
      }
    ?>  
    <li><a href="index.php?pageid=dashboard">Dashboard</a></li>
  </ul>
</nav>

<header>
  <h1>Automatiserade, sparade närspelskort i molnet.</h1>
  <p>Registrera dina närspelskortsrundor genom att ange antalet poäng på varje gren. Få automatiserade handicapsjusteringar och sparad historik över dina rundor</p>
  <a href="index.php?pageid=register"><button>Kom igång</button></a>
</header>
<section id="section-1">
  <div class="section-content">
    <h2>Låt oss sköta uträkningarna</h2>
    <p>Istället för att lägga tid på att räkna ut och hålla koll på ditt närspelshandicap sköter vi allt det åt dig. Det enda du behöver göra är att utföra dina rundor med största fokus möjligt, och sedan skicka in dina poäng till oss. Resten löser vi. Därefter kan du besöka "statistik" sidan och se dina resulta i flera olika former.</p>
  </div>
</section>
<footer>
  <ul>
    <h2>Närspelskortet.se</h2>
    <a href="index.php"><li>Start</li></a>
    <a href="index.php?pageid=register"><li>Registrera</li></a>
    <a href="index.php?pageid=login"><li>Logga in</li></a>
  </ul>
</footer>

<style>
  <?php include('style.css'); ?>
</style>
