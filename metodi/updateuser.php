<?php
    require_once('../config.php');
    $username=$_POST['username'];
    $olduser=$_SESSION['userid'];
    $query="UPDATE account
            SET username='$username'
            WHERE username='$olduser';";
    mysqli_query($db_connect,$query);
    if(mysqli_query($db_connect,$query)){
        $_SESSION['userid']=$username;
        header('Location: ../index.php');
    }
?>