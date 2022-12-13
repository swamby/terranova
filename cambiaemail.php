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
      echo('<br><br>');
      require_once('config.php');
      $us = $_SESSION['userid'];
      $query = "SELECT username,email,pass from account where username='$us';";
      $res = mysqli_fetch_array(mysqli_query($db_connect,$query));
      $_SESSION['email']=$res['email'];
      echo('
      <center>
        <form action="metodi/updateemail.php" method="POST">
        <div style="width:50%;">
        Email
        <input class="form-control" type="text" placeholder="'.$res['email'].'" readonly>
        <br>
        Nuova Email
        <input class="form-control" name="email" type="text">
        <br>
        <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
      </center>
      ');
    ?>
    </body>
    
  <?php
  include('footer.php');
  ?>
</html>
    