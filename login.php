<?php
   include 'connect.php';
   session_start();
   $error='';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password = mysqli_real_escape_string($db, $_POST['password']); 
      $sql = "SELECT * FROM register WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $hashed_password = $row['password'];

      if(password_verify($password, $hashed_password)){
         $_SESSION['login_user'] = $email;
         header("location: dashboard/profil.php");
      }
      else{
         $error = "<p class='text-danger'>Email or password wrong</p>";
      }
      
   }
?>