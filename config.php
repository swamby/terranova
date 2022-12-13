<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'sport';
    session_start();
    session_id($id = null);
    $db_connect = mysqli_connect($host,$username,$password);
    /*if(!$db_connect){
        print "errore nel collegamento";
    }
    else{
        print "connessione avvenuta con successo";
    }*/
    mysqli_select_db($db_connect,$db);
    ?>