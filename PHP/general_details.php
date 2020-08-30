<?php
include "config.php";
// echo "Hello";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $login=$_POST["login"];
    $name=$_POST["names"];
    $date=$_POST["dob"];
    $email=$_POST["email"];
    $panno=$_POST["panno"];
    $panurl=$_FILES["panurl"]["name"];
    $aadharno=$_POST["aadhar"];
    $aadharurl=$_FILES["aadharurl"]["name"];
    $joining=$_POST["join"];
    $appoint=$_FILES["appoint"]["name"];
    $research=$_FILES["research"]["name"];
    // $login="$login";
    // $password="$password";


    // Pan url store
    $pan_url_store="C:/Users/computer solution/Desktop/Calculator".$panurl;
    move_uploaded_file($_FILES['panurl']['tmp_name'],$pan_url_store);

    // Aadhar url store
    $aadhar_url_store="C:/Users/computer solution/Desktop/Calculator".$aadharurl;
    move_uploaded_file($_FILES['aadharurl']['tmp_name'],$aadhar_url_store);

    // appointment url store
    $appointment_url_store="C:/Users/computer solution/Desktop/Calculator".$appoint;
    move_uploaded_file($_FILES['panurl']['tmp_name'],$appointment_url_store);

    // research letter url
    $research_url_store="C:/Users/computer solution/Desktop/Calculator".$research;
    move_uploaded_file($_FILES['panurl']['tmp_name'],$research_url_store);

    $sql1="INSERT INTO personal_info(Login, Name, Dob, Email, Pan_No, Pan_Url, Aadhar_No, Aadhar_Url, Joining_Date, Appointment_Letter_Url,Research_Profile_Url) VALUES('";
	$sql1 .= $login ."','" .$name."','" .$date."','" .$email."','" .$panno. "','" .$pan_url_store. "','" .$aadharno. "','" .$aadharurl. "','" .$joining. "','" .$appoint. "','" .$research. "')";
    if(mysqli_query($conn,$sql1)){
        echo"<script>alert("Successfuly Added")</script>";
    }
    else{
        echo "error occured";
    }
    
    
}

?>