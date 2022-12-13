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
  <center>
  <form style="width:50%; margin: 3%;" action="metodi/inserisci.php" method="POST">
            <div class="form-group">
                <label for="titolo" name="titolo">Titolo</label>
                <input type="text" name="titolo" class="form-control" id="titolo" placeholder="Inserisci titolo">
            </div>
            <div class="form-group">
                <label for="descrizione" name="descrizione">Descrizione Articolo</label>
                <input type="text" name="descrizione" class="form-control" id="descrizione" placeholder="Inserire Descrizione">
            </div>
            <div class="form-group">
                <label for="notizia" name="notizia">Testo notizia</label>
                <br>
                <textarea id="notizia" name="notizia" rows="6" cols="100">
                </textarea>
            </div>
            <div class="form-group">
                <label for="dataP" name="dataP">Data Pubblicazione</label>
                <input type="date" name="dataP" class="form-control" id="dataP" placeholder="Inserire Data Pubblicazione">
            </div>
            <div class="form-group">
                <label for="categoria" name="categoria">Categoria Articolo</label>
                <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Inserire Categoria (Lettera Maiuscola)">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
  </form>
  
</center>

<?php
  include('footer.php');
  ?>