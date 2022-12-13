<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bg-light">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
      include('header.php');
      require_once('config.php');
    ?>
    <br>
  <div class="containercsss">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
$strSQL = "SELECT * FROM notizie ;";
$rs = mysqli_query($db_connect,$strSQL);
print "<br>";
$k=0;
print('<center>');
while($row = mysqli_fetch_array($rs))
{ 
  $image='img/articoli/'. $row['idNotizia'].'.jpg';
  if($k==0){
echo('
  <div class="carousel-item active opacity-50">
    <a href="pagina.php?id='.$row['idNotizia'].'">
      <img class="d-block w-110 m-3 mb-5 opacity-50" src="'.$image.'" style="width: 100%" alt="First slide">
    </a>
    <div class="carousel-caption d-none d-md-block">
    <h5 class="bg-dark">'.$row['titolo'].'</h5>
  </div>
  </div>
');
$k=$k+1;
}
else{
  echo('
  <div class="carousel-item opacity-50">
    <a href="pagina.php?id='.$row['idNotizia'].'">
    <img class="d-block w-110 m-3 mb-5 opacity-50" src="'.$image.'" style="width: 100%" alt="First slide">
    </a>
    <div class="carousel-caption d-none d-md-block">
    <h5 class="bg-dark">'.$row['titolo'].'</h5>
  </div>
  </div>
');
}
}
print('</center>');
?>
    </div>
    <a class="carousel-control-prev m-2" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="h-25 w-50 carousel-control-prev-icon m-2 bg-dark" aria-hidden="true"></span>
    <span class="sr-only">Precedente</span>
  </a>
  <a class="carousel-control-next m-2" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="h-25 w-50 carousel-control-next-icon m-2 bg-dark" aria-hidden="true"></span>
    <span class="sr-only">Successiva</span>
  </a>
</div>
</div>
<div class="containercss">
    <div class="notiziesx">

      <div class="flex-wrap d-flex justify-content-around mb-3 shadow-sm p-3 mb-5 bg-body rounded">
      <h2 class="text-danger ">Notizie Principali</h2>
        <div class="notiziasx">
          <?php
$strSQL = "SELECT * FROM notizie ;";
$rs = mysqli_query($db_connect,$strSQL);
$k=0;
while($row = mysqli_fetch_array($rs))
{ 
$k=$k+1;
if($k>=3){
  $image='img/articoli/'. $row['idNotizia'].'.jpg';
echo('
<div class="card m-4 h-10" style="width: 18rem;">
  <img class="card-img-top" style="height: 11rem;" src="'.$image.'" alt="Card image cap">
  <div class="card-body">
    <p>'.$row['categoria'].'</p>
    <h5 class="card-title">'.$row['titolo'].'</h5>
    <p class="card-text">'.$row['descrizione'].'</p>
    <p>'.$row['dataP'].'</p>
    <a href="pagina.php?id='.$row['idNotizia'].'" class="mb-1 btn btn-primary">Leggi articolo</a>
  </div>
</div>
');
}
}
?>
        </div>
      </div>
    </div>

      <div class="notiziedx">
        <div class="notizia">
    
          <div class="flex-wrap d-flex justify-content-around mb-3 shadow-sm p-3 mb-5 bg-body rounded">
          <h2 class="text-danger">Notizie Calcio</h2>
          <?php
require_once('config.php');
$strSQL = "SELECT * FROM notizie ;";
$rs = mysqli_query($db_connect,$strSQL);
print "<br>";
while($row = mysqli_fetch_array($rs))
{ 
  if($row['categoria']=='Calcio'){
    $image='img/articoli/'.$row['idNotizia'].'.jpg';
echo('
<div class="card m-4" style="width: 18rem;">
  <img class="card-img-top" src="'.$image.'" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">'.$row['titolo'].'</h5>
    <p class="card-text">'.$row['descrizione'].'</p>
    <a href="pagina.php?id='.$row['idNotizia'].'" class="btn btn-primary mb-0">Leggi articolo</a>
  </div>
</div>
');
}
}
?>

        </div>
      </div>
  </div>
  <?php
  include('footer.php');
  ?>
  </body>
</html>