<?php
require_once('config.php');
?>
<title>SportsNews24</title>

<div class="shadow-lg p-3 rounded bg-primary m-0">
        <div class="d-flex justify-content-between">

            <div class="p-2 ml-2 mt-3">
                <nav class="navbar navbar-light  bg-primary">
                    <a class="navbar-brand text-white" href="index.php">
                        <b>
                        SportsNews24
                        </b>
                    </a>
                </nav>
            </div>
            
            
            <div class="p-2 mt-3">
            <nav class="navbar bg-primary">
                    <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light bg-primary text-white">
<b>
<a class="navbar-brand text-white" href="calcio.php">Calcio</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<a class="navbar-brand text-white" href="automobilismo.php">Automobilismo</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<a class="navbar-brand text-white" href="tennis.php">Tennis</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

</nav>
                        <form class="d-flex" role="search" action="ricerca.php" method="POST">
                            <input class="form-control me-2"  type="search" name="search" id="search" placeholder="..." aria-label="Search">
                            <button class="btn btn-light ml-2" type="submit">Ricerca</button>
                        </form>
                    </div>
                </nav>
            </div>


            <div class="p-2 mr-5 mt-3">
                <?php
                    if(!isset($_SESSION['userid'])){
                    echo('
                        <a href="registrati.php" class="btn btn-light mt-3" role="button" aria-pressed="true">Registrati</a>
                        <a href="accedi.php" class="btn btn-light mt-3 ml-2" role="button" aria-pressed="true">Accedi</a>
                    ');
                    }
                    else if(isset($_SESSION['userid']) && $_SESSION['role']==1){
                        echo('
                        <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle mt-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        '.$_SESSION['userid'].'
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="account.php">Account</a>
                          <a class="dropdown-item" href="inserimento.php">Aggiungi Articolo</a>
                          <a class="dropdown-item" href="metodi/logout.php">Esci</a>
                        </div>
                        </div>
                        ');
                    }
                    else if(isset($_SESSION['userid']) && $_SESSION['role']==0){
                        echo('
                        <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle mt-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        '.$_SESSION['userid'].'
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="account.php">Account</a>
                          <a class="dropdown-item" href="metodi/logout.php">Esci</a>
                        </div>
                        </div>
                      ');
                    }
                ?>
            </div>

        </div>
    </div>
                </b>