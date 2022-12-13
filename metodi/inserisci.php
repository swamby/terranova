<?php
    require_once('../config.php');
    $titolo=$_POST['titolo'];
    $descrizione=$_POST['descrizione'];
    $notizia=$_POST['notizia'];
    $dataP=$_POST['dataP'];
    $categoria=$_POST['categoria'];
    $query = "INSERT INTO `notizie`
              (titolo, descrizione, notizia, dataP, categoria) 
              VALUES 
              ('$titolo','$descrizione','$notizia','$dataP','$categoria');";
    mysqli_query($db_connect,$query);
    if($query){
        include('../header.php');
        echo('
            <br>
            <br>
            <br>
            <h3>Inserimento Avvenuto Correttamente</h3>
            <a href="../index.php" class="btn btn-light mt-3" role="button" aria-pressed="true">Torna alla home</a>
        ');
        header('Location: ../index.php');
        exit;
    }
    else{
        include('../header.php');
        echo('
            <br>
            <br>
            <br>
            <h3>Inserimento Non Avvenuto!</h3>
            <a href="../inserimento.php" class="btn btn-light mt-3" role="button" aria-pressed="true">Riprova</a>
        ');
        header('Location: ../index.php');
        exit;
    }