<?php
include "config.php";
session_start();
// echo "Hello";
// GLOBAL $result1;
// GLOBAL $sql1;
// $logo=$_POST["login"];
// global $login;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // global $login;
    $login=$_POST["login"];
    // $_SESSION["id"]=$login;
    $password=$_POST["password"];
    // $login="$login";
    // $password="$password";


    $sql="SELECT Login,Password FROM login_and_password where Login='$login' and Password='$password'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) == 0) { 
        echo '<script> alert("Please check login or password") </script>';

        
     } 
     else { 
         echo '<script> alert("Succesfully Login") </script>'; 
         $sql1="select * from personal_info where Login='$login'";
        // $result1;
         $result1=mysqli_query($conn,$sql1);
         if (mysqli_num_rows($result1) == 0) { 
             echo '<script>location.href="../HTML/general details.html"</script>';
             
             
        } 
        else{
            // $result1=$result1;
            echo '<script>location.href="../PHP/modified_gd.php"</script>';
            // echo  "Jayesh Tu kar";
          }
    }
    
    
    
}

?>