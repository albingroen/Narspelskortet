<?php 
  if(!isset($_SESSION['user'])){
    header("Location: index.php?pageid=login");
    exit();
  } 

  if(!empty($_POST['shortPuts']) && !empty($_POST['longPuts']) && !empty($_POST['chips']) && !empty($_POST['pitches']) && !empty($_POST['bunkerShots']) ) {
    $shortPuts = intval(htmlspecialchars($_POST['shortPuts']));
    $longPuts = htmlspecialchars($_POST['longPuts']);
    $chips = intval(htmlspecialchars($_POST['chips']));    
    $bunkerShots = intval(htmlspecialchars($_POST['bunkerShots']));    
    $pitches = intval(htmlspecialchars($_POST['pitches']));
    $total = $shortPuts + $longPuts + $chips + $bunkerShots + $pitches;        
  
    // Calculate new handicap
    $oldHandicap = $userDetails['handicap'];
    
    $total;

    $handicapTable = array(
      -40 => 36,-39 => 36,-38 => 35,-37 => 35,-36 => 34,-35 => 34,-34 => 33,-33 => 33,-32 => 32,-31 => 32,-30 => 32,-29 => 31,-28 => 31,-27 => 31,-26 => 30,-25 => 30,-24 => 30,-23 => 29,-22 => 29,-21 => 29,-20 => 28,-19 => 28,-18 => 28,-17 => 27,-16 => 27,-15 => 27,-14 => 26,-13 => 26,-12 => 26,-11 => 25,-10 => 25,-9 => 25,-8 => 24,-7 => 24,-6 => 24,-5 => 23,-4 => 23,-3 => 23,-2 => 22,-1 => 22,22,21,21,21,20,20,20,19,19,19,19,18,18,18,18,17,17,17,17,16,16,16,16,15,15,15,15,14,14,14,14,13,13,13,13,12,12,12,12,11,11,11,11,10,10,10,0,9,9,9,8,8,8,7,7,7,6,6,6,5,5,5,4,4,4,3,3,3,2,2,2,1,1,1,0,0,0,-1,-1,-1,-1,-2,-2,-2,-2,-2,-3,-3,-3,-3,-3,-3
    );

    

    $pointHandicap = $handicapTable[$total];
    $difference = ($oldHandicap - $pointHandicap) / 2;
    $newHandicap = $oldHandicap - $difference;
    
    $addGame = $db->prepare("INSERT INTO game (shortPut, longPut, chip, pitch, bunker, score, user) VALUES ({$shortPuts}, {$longPuts}, {$chips}, {$pitches}, {$bunkerShots}, {$total}, '{$_SESSION['user']}')");
    $addGame->execute();

    $changeHandicap = $db->prepare("UPDATE users SET handicap = $newHandicap WHERE email = '{$_SESSION['user']}'");
    $changeHandicap->execute();
    header("Location: index.php?pageid=dashboard");
    exit();
  }

?>  
  
<div class="header">
  <h1>Registrera omgång</h1>
  <p>Här registrerar du en runda genom att fylla i fälten nedan.
</div> 
<div class="card">
  <form action="" method="post">
    <input type="number" name="shortPuts" placeholder="Korta puttar" required>
    <input type="number" name="longPuts" placeholder="Långa puttar" required>
    <input type="number" name="chips" placeholder="Chippar" required>
    <input type="number" name="pitches" placeholder="Pitchar" required>
    <input type="number" name="bunkerShots" placeholder="Bunkerslag" required>
    <button>Registrera omgång</button>
  </form>
</div>

<style>
  <?php include('style.css') ?>
</style>
