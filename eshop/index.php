<?php 
session_start();

include("header.php");
require 'DbConnection.class.php';
?>
<script>
$('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});
</script>
<style>
.card{
  color:white;
  height:100vh;
}
@media screen and (orientation:landscape) {
  .card{
  height:100vh;
  margin-top:0px !important;
}
}
    .list-group-item:nth-child(odd){
        background-color:#00b295;
    }
    .list-group-item:nth-child(even){
        background-color:grey;
    }
.carousel-inner{
  border-radius:20px;
}


</style>

<div class="card bg-dark text-center">
  <div class="card-header">
    <h3>Proč si vybrat náš obchod?</h3>
  </div>
  <div class="card-body">
  <ul class="list-group">
  <li class="list-group-item"><b>1. Za zboží objdenané na našem webu neplatíte poštovné</b></li>
  <li class="list-group-item"><b>2. Rozumíme Vám i elektronice</b></li>
  <li class="list-group-item"><b>3. Garantujeme vždy skvělou cenu</b></li>
</ul>
<h2 class="mt-2 mb-2">AKTUÁLNĚ:</h2>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active slide">
      <img class="d-block w-100 slide" src="img/Kreslicí plátno 1.svg" alt="First slide">
    </div>
    <div class="carousel-item slide">
      <img class="d-block w-100" src="img/Kreslicí plátno 1.svg" alt="Second slide">
    </div>
    <div class="carousel-item slide">
      <img class="d-block w-100" src="img/Kreslicí plátno 1.svg" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  </div>
  <div class="card-footer text-muted">
    <small>
Made by Ladislav Vašina 4.E 2020
    </small>
  </div>
</div>