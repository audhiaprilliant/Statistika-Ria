<?php
    include 'connect.php';

    if (isset($_POST['daftar']) && $error == 0) { 

        $name = mysqli_real_escape_string($db, $fullname);
        $email = mysqli_real_escape_string($db, $email);
        $password_hash = mysqli_real_escape_string($db, password_hash($password, PASSWORD_DEFAULT));

        $sql = "INSERT INTO register VALUES('$email', '$name','$password_hash')";
        if(mysqli_query($db, $sql)){
           echo "<script>alert('$name, please login');
          window.location.href='form-login.php';
          </script>";
        }
        else{
          echo "<script>alert('$name has been registered');
          window.location.href='form-login.php';
          </script>";
        }

    }

?>