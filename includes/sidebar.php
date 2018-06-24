<div id="sidebar">
  <ul id="nav-list" >
    <li class="nav-list-item" ><a href="index.php?pageid=dashboard"><i class="fas fa-chart-bar"></i>Statistik</a></li>
    <li class="nav-list-item" ><a href="index.php?pageid=add"><i class="fas fa-plus-square" ></i>Registrera omgång</a></li>
    <li class="nav-list-item" ><a href="index.php?pageid=profile"><i class="fas fa-user-circle"></i>Profil</a></li>
    <li class="nav-list-item" ><a href="index.php?pageid=leaderboard"><i class="fas fa-clipboard-list "></i>Poängtavla</a></li>
    <li class="nav-list-item" ><a href="index.php?pageid=profile"><i class="fas fa-cog "></i>Inställningar</a></li>
    <li onClick="openWindow()" id="hamburger" ><i class="fas fa-bars "></i></li>
    <li onClick="closeWindow()" id="cross" ><i class="fas fa-times "></i></li>
    
  </ul>
  <div id="details">
    <h3><?php echo $userDetails['firstname'] , " " , $userDetails['lastname']; ?></h3>
    <a href="index.php?logout=true"><h4>Logga ut</h4></a>
  </div>
</div>

<style>
  <?php 
    include('sidebar.css');
  ?>
</style>
<script>
  function openWindow(){
    document.getElementById("sidebar").style.height = "100vh";
    document.getElementById("sidebar").style.position = "fixed";
    document.getElementById("hamburger").style.display = "none";
    document.getElementById("cross").style.display = "block";
    document.getElementById("details").style.display = "block";
    let listElements = document.getElementsByClassName("nav-list-item")
    for (var i=0;i<listElements.length;i+=1){
      listElements[i].style.display = 'block';
    }
  }

  function closeWindow(){
    document.getElementById("sidebar").style.height = "65px";
    document.getElementById("sidebar").style.position = "relative";
    document.getElementById("hamburger").style.display = "block";
    document.getElementById("cross").style.display = "none";
    document.getElementById("details").style.display = "none";
    let listElements = document.getElementsByClassName("nav-list-item")
    for (var i=0;i<listElements.length;i+=1){
      listElements[i].style.display = 'none';
    }
  }
</script>
