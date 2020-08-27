<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $login=$_POST["login"];
    $password=$_POST["password"];
    // $cont=$_POST["cont"];
    // $add=$_POST["add"];
    // $gen=$_POST["gen"];
    $sql="INSERT INTO login_and_password(Login, Password) VALUES('";
	$sql .= $login ."','" .$password."')";
    if(mysqli_query($conn,$sql)){
        echo "Successfully Submitted";
        
    }
    
}

?>