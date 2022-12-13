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
        <form class="form"  method="post" action="metodi/registrazione.php">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" aria-describedby="nome" placeholder="Inserisci nome">
            </div>
            <div class="form-group">
                <label for="cognome">Cognome</label>
                <input type="text" name="cognome" class="form-control" id="cognome" placeholder="Inserisci cognome">
            </div>            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Inserisci username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Inserisci email">
                <small id="emailHelp" name="email" class="form-text text-muted">La tua email non verrà visualizzata da nessuno e non riceverai alcuna email promozionale</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="pass" class="form-control" id="password" placeholder="Inserire password">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
        </form>

    </body>
</html>