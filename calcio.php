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
        <div class="containercss">
        <?php
            $strSQL = "SELECT * FROM notizie WHERE categoria='calcio'";
            $rs = mysqli_query($db_connect,$strSQL);
            print "<br>";
            echo('<div class="ricerca">');
            while($row = mysqli_fetch_array($rs))
            { 
                    $image='img/articoli/'. $row['idNotizia'].'.jpg';
                    echo('
                        <div class="card m-4 h-10" style="width: 18rem;">
                            <img class="card-img-top" src="'.$image.'" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['titolo'].'</h5>
                                <p class="card-text">'.$row['descrizione'].'</p>
                                <a href="pagina.php?id='.$row['idNotizia'].'" class="btn btn-light">Leggi articolo</a>
                            </div>
                        </div>
                    ');
            }
            echo('</div>');
        ?>
        </div>
        
  <?php
  include('footer.php');
  ?>
    </body>
</html>