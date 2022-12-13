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
    <div class="notiziapagina">
    <?php
        $id=$_GET['id'];
        $strSQL = "SELECT * FROM notizie WHERE idNotizia=$id;";
        $rs = mysqli_query($db_connect,$strSQL);
        $row = mysqli_fetch_array($rs);
        $image='img/articoli/'. $row['idNotizia'].'.jpg';
        echo('
            <center>
            <img class="imgnotizia" src="'.$image.'" alt="Card image cap">
            <h1 style="color: red;">'.$row['titolo'].'</h1>
            <br>
            <h3>'.$row['descrizione'].'</h3>
            <br>
            <br>
            </center>
            <h4>'.$row['notizia'].'</h4>
            <br>
            <br>
        ');
    ?>
    </div>     
    
  <?php
  include('footer.php');
  ?>  
  </body>
</html>