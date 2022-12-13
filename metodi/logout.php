<?php
    require('../config.php');
    unset($_SESSION['userid']);
    $_SESSION['role']=0;
    header('Location: ../index.php');
?>
