<?php
  // Send user to dashboard if signed in
  if(!empty($_SESSION['user'])){
    header("Location: index.php?pageid=dashboard");
    exit();
  }

  // Defining error message if email or password is incorrect
  if(!empty($_GET['err'])){
    $errMsg = "Epost eller lösenord är felaktigt";
  }
?>
<div class="wrapper">
  <a href="index.php" class="back">Tillbaks</a>
  <div class="modal">
    <div class="modal-left"></div>
    <div class="modal-right">
      <h1 class="primary-font">Logga in på ditt konto</h1>
      <form method="post" action="index.php?pageid=dashboard">
        <input autocomplete="new-email" type="email" placeholder="Epost-adress" name="emailLogin" required >
        <input autocomplete="new-password" type="password" placeholder="Lösenord" name="passwordLogin" required >
        <br>
        <?php
          // Showing error message when needed
          if(!empty($_GET['err'])){
            echo "<span class=error>{$errMsg}</span>";
          }
        ?>
        <br>
        <button>Logga in</button>
      </form>
    </div>
  </div>
</div>
<style>
  <?php include('style.css'); ?>
</style>
