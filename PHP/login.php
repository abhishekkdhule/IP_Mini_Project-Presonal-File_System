<?php
include "config.php";
// echo "Hello";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $login=$_POST["login"];
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
    }
    
}

?>