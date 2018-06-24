<?php 
  if(!isset($_SESSION['user'])){
    header("Location: index.php?pageid=login");
    exit();
  } 

  $games = $db->prepare("SELECT * FROM game WHERE user = '{$_SESSION['user']}'");
  $games->execute();
  
  $countGames = $db->prepare("SELECT COUNT (user) FROM game WHERE user = '{$_SESSION['user']}'");
  $countGames->execute();
  $count = $countGames->fetch();  

  // Average values
  $avgShortPutsStmt = $db->prepare("SELECT AVG(shortPut) FROM game WHERE user = '{$_SESSION['user']}'");
  $avgShortPutsStmt->execute();
  $avgShortPut = $avgShortPutsStmt->fetch();  

  $avgLongPutsStmt = $db->prepare("SELECT AVG(longPut) FROM game WHERE user = '{$_SESSION['user']}'");
  $avgLongPutsStmt->execute();
  $avgLongPut = $avgLongPutsStmt->fetch();  

  $avgChipsStmt = $db->prepare("SELECT AVG(chip) FROM game WHERE user = '{$_SESSION['user']}'");
  $avgChipsStmt->execute();
  $avgChip = $avgChipsStmt->fetch();  

  $avgPitchesStmt = $db->prepare("SELECT AVG(pitch) FROM game WHERE user = '{$_SESSION['user']}'");
  $avgPitchesStmt->execute();
  $avgPitch = $avgPitchesStmt->fetch();  

  $avgBunkerStmt = $db->prepare("SELECT AVG(bunker) FROM game WHERE user = '{$_SESSION['user']}'");
  $avgBunkerStmt->execute();
  $avgBunker = $avgBunkerStmt->fetch();  
    
?>

  <div class="header">
    <h1>Statistik</h1>
    <p>Här är en sida med statistik över ditt närspel.</p>
  </div>
  <div class="top-cards">
    <div class="card">
      <h3>Omgångar | Totalt</h3>    
      <h1><?php echo $count[0]; ?></h1>
      <a href="index.php?pageid=add">
        <div class="add">
          <span>+</span>
        </div>        
      </a>
    </div>
    <div class="card card--small ">
      <h3>Närspelshandicap</h3>    
      <h1><?php echo $userDetails['handicap']; ?></h1>        
    </div>
  </div>
  <div class="avarage-cards">
    <div class="card-avg">
      <h3>Genomsnitt | Korta puttar</h3>    
      <h1><?php echo round($avgShortPut[0]); ?>/20</h1>
    </div>
    <div class="card-avg">
      <h3>Genomsnitt | Långa puttar</h3>    
      <h1><?php echo round($avgLongPut[0]); ?>/30</h1>
    </div>
    <div class="card-avg">
      <h3>Genomsnitt | Chippar</h3>    
      <h1><?php echo round($avgChip[0]); ?>/30</h1>
    </div>
    <div class="card-avg">
      <h3>Genomsnitt | Pitchar</h3>    
      <h1><?php echo round($avgPitch[0]); ?>/30</h1>
    </div>
    <div class="card-avg">
      <h3>Genomsnitt | Bunker</h3>    
      <h1><?php echo round($avgBunker[0]); ?>/30</h1>
    </div>
  </div>
  <div class="history-cards">
    <h2>Historik</h2>
    <div class="cards">
      <div style="background: none; box-shadow: none;" class="card">
        <h3>Korta puttar</h3>
        <h3>Långa puttar</h3>
        <h3>Chippar</h3>
        <h3>Pitchar</h3>
        <h3>Bunkerslag</h3>          
      </div>
      <?php 
        while($game = $games->fetch()){
          echo <<<CARD
          <div class="card" >
            <h4>{$game['shortPut']}</h4>
            <h4>{$game['longPut']}</h4>
            <h4>{$game['chip']}</h4>
            <h4>{$game['pitch']}</h4>
            <h4>{$game['bunker']}</h4>
          </div>
CARD;
        }
      ?>
    </div>
  </div>
<style>
  <?php include('style.css') ?>
</style>
