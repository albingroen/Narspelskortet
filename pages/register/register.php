<?php
  // Send user to dashboard if signed in
  if(!empty($_SESSION['user'])){
    header("Location: index.php?pageid=dashboard");
    exit();
  }
?>
<a href="index.php" class="back">Tillbaks</a>
<div class="modal">
  <div class="modal-left"></div>
  <div class="modal-right">
    <h1 class="primary-font">Registrera ett konto</h1>
   <form method="post" action="index.php?pageid=login">
    <div class="rowInput">
      <input type="text" placeholder="Förnamn" name="firstname" required >
      <input type="text" placeholder="Efternamn" name="lastname" required >
    </div>
    <input type="number" placeholder="Närspelshandikap" name="handicap" required >
    <div class="rowInput">
      <input autocomplete="new-email" type="email" placeholder="Epost-adress" name="email" required >
      <input  autocomplete="new-password" type="password" placeholder="Lösenord" name="password"  required >
    </div>
    <button>Skapa konto</button>
  </form>
  </div>
</div>
<style>
  <?php include('style.css') ?>
</style>
