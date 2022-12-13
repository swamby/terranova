
    <?php
      require_once('../config.php');
      $email=$_POST['email'];
      $pass=$_POST['pass'];
      $query2 = "SELECT admins from account where email='$email';";
      $admin = mysqli_fetch_array(mysqli_query($db_connect,$query2));
      $check1 = "SELECT count(idAccount)as conto from account where email='$email'";
      $check1 = mysqli_fetch_array(mysqli_query($db_connect,$check1));
      if($check1['conto']==1){
        $check2 = "SELECT pass from account where email='$email'";
        $check2 = mysqli_fetch_array(mysqli_query($db_connect,$check2));
        if($check2['pass']==$pass){
            $query = "SELECT username from account where email='$email';";
            $userres = mysqli_fetch_array(mysqli_query($db_connect,$query));
            $username = $userres['username'];
            $_SESSION['userid']=''.$username.'';
            if($admin['admins']==1){
              $_SESSION['role']=1;
            }
            header('Location: ../index.php');
            exit;
        }
        else{
          header('Location: ../erroreacc.php');
          exit;
        }
    }
    else{
      header('Location: ../erroreacc.php');
      exit;
    }
    ?>