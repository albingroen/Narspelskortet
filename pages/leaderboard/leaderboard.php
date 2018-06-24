<?php 

  $leaderBoard = $db->prepare("SELECT * FROM users ORDER BY handicap");
  $leaderBoard->execute();

?>

<div class="header">
  <h1>Poängtavla</h1>
  <p>Här ser du en leaderboard på alla som använder närspelskortet och som registrerar sina rundor.</p>
</div>

<div class="leaderboard">
  <?php 

    while($player = $leaderBoard->fetch()){
      echo <<<PLAYER
      <a href= >
        <div class=card>
          <h2>{$player['firstname']} {$player['lastname']}</h2>
          <h2>{$player['handicap']}</h2>
        </div>
      </a>
PLAYER;
    }
  
  ?>
</div>

<style>
  <?php include('style.css') ?>
</style>
