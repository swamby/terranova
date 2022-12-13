<?php
    require('../config.php');
    $pass=$_POST['pass'];
    $id=$_SESSION['userid'];
    $query="UPDATE account
            SET pass='$pass'
            WHERE username='$id';";
    mysqli_query($db_connect,$query);
    if(mysqli_query($db_connect,$query)){
        header('Location: ../index.php');
    }
?>