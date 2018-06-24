<?php 
  session_start();
  ob_start();
  $db = new PDO("sqlite:narspelskortet.db");  

  // Logging a user out
  if(!empty($_GET['logout'])){
    session_unset();
    session_destroy();
  }

  // Adding a user to db
  if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['handicap']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $handicap = htmlspecialchars($_POST['handicap']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    
    $addUser = $db->prepare("INSERT INTO users (firstname, lastname, handicap, email, password) VALUES ( '{$firstname}', '{$lastname}', '{$handicap}', '{$email}', '{$password}')");
    $addUser->execute();
  }

  // Logging a user in
  if(!empty($_POST['emailLogin']) && !empty($_POST['passwordLogin'])){
    $emailUser = htmlspecialchars($_POST['emailLogin']);    
    $passwordUser = htmlspecialchars($_POST['passwordLogin']);
    $findPassword = $db->prepare("SELECT password FROM users WHERE email = '{$emailUser}'");
    $findPassword->execute();
    $password = $findPassword->fetch();
    
    if(password_verify($passwordUser, $password[0])){      
      $_SESSION['user'] = $emailUser;
      
    }
  }  

  if(isset($_SESSION['user'])){
    $stmtUser = $db->prepare("SELECT * FROM users WHERE email = '{$_SESSION['user']}'")  ;
    $stmtUser->execute();  
    $userDetails = $stmtUser->fetch();
    $username = $userDetails['firstname'];
  }

  if(!isset($_GET['pageid'])){
    $pageid = "start";
   } else {
     $pageid = htmlspecialchars($_GET['pageid']);
   }

  
  
  if(!empty($_GET['pageid'])){
    require("includes/header.php");
    echo "<div class=page-container>";
    
    if(($_GET['pageid'] != 'login') && ($_GET['pageid'] != 'register')){
      require("includes/sidebar.php");
    }
    
    echo "<div class=content-wrapper>";
    echo "<div class=content>";
    require("pages/{$pageid}/{$pageid}.php");
    echo "</div>";
    echo "</div>";
    echo "</div>";
    require("includes/footer.php");
  } else {
    require("includes/header.php");
    require("pages/start/start.php");
    require("includes/footer.php");
  }
?>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/solid.css" integrity="sha384-VxweGom9fDoUf7YfLTHgO0r70LVNHP5+Oi8dcR4hbEjS8UnpRtrwTx7LpHq/MWLI" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/fontawesome.css" integrity="sha384-rnr8fdrJ6oj4zli02To2U/e6t1qG8dvJ8yNZZPsKHcU7wFK3MGilejY5R/cUc5kf" crossorigin="anonymous">
</head>
<style>
  body {
    font-family: 'Roboto', sans-serif;      
  }
  <?php 
    include('styles/main.css');
  ?>
</style>
