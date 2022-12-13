<?php
    require('../config.php');
    $email=$_POST['email'];
    $oldemail=$_SESSION['email'];
    $query="UPDATE account
            SET email='$email'
            WHERE email='$oldemail';";
    mysqli_query($db_connect,$query);
    if(mysqli_query($db_connect,$query)){
        header('Location: ../index.php');
    }
?>