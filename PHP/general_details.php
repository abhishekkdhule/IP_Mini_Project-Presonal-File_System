<?php
include "config.php";
include "login.php";
// echo $_POST["login"];
// session_start();
var_dump($_SESSION["id"]);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // json files
        // $expdata = json_decode($_POST['exp_data']);
        // $qualdata = json_decode($_POST['qual_data']);
        // $exqualdata = json_decode($_POST['ex_qual_data']);

        // general details
        // $login=$_POST["login"];
        $login="44444";
        $name=$_POST["name"];
        $date=$_POST["date_of_birth"];
        $email=$_POST["email"];
        $panno=$_POST["PAN_no"];
        $panurl=$_FILES["PAN_doc"]["name"];
        $aadharno=$_POST["aadhar_no"];
        $aadharurl=$_FILES["aadhar_doc"]["name"];
        $joining=$_POST["date_of_joining"];
        $appoint=$_FILES["date_of_joining_doc"]["name"];


            // Pan url store
    $pan_url_store="C:/Users/computer solution/Desktop/Calculator".$panurl;
    move_uploaded_file($_FILES['PAN_doc']['tmp_name'],$pan_url_store);

    // Aadhar url store
    $aadhar_url_store="C:/Users/computer solution/Desktop/Calculator".$aadharurl;
    move_uploaded_file($_FILES['aadhar_doc']['tmp_name'],$aadhar_url_store);

    // appointment url store
    $appointment_url_store="C:/Users/computer solution/Desktop/Calculator".$appoint;
    move_uploaded_file($_FILES['date_of_joining_doc']['tmp_name'],$appointment_url_store);


        // research papers

        $research1=$_POST["google_scholar"];
        $research2=$_POST["orcid"];
        $research3=$_POST["scopus"];
        $research4=$_POST["publons"];
        


        //__________________________________ Experience________________________________
        $expdata = json_decode($_POST['exp_data']);

        $paper_dir = "C:/Users/computer solution/Desktop/Calculator/";
        for ($i=0; $i < count($expdata); $i++) { 

            $key = $expdata[$i];
            // var_dump ($expdata);
            $paper_url = $paper_dir . $key->file;
            $paper_sql = "INSERT INTO `experience`(`Login`, `Organisation_Name`, `From_Date`, `To_Date`, `Releiving_Url`)
                            VALUES ('$login','$key->name','$key->from',' $key->to','$paper_url')";
            move_uploaded_file($_FILES['exp_file'.$i]['tmp_name'],$paper_url);


            if ($conn->query($paper_sql)){
                echo "Experience Redorded<br>";
            }
            else{
                echo "Error";
            }
            // echo "$key->title - $key->name_of_journal - $key->impact_factor - $paper_url  <br>";
        }
    //    _________________________experience ends___________________________________
    // _____________________________qualification_______________________________

    $qualdata = json_decode($_POST['qual_data']);

    $paper_dir = "C:/Users/computer solution/Desktop/Calculator/";
    for ($i=0; $i < count($qualdata); $i++) { 

        $keyq = $qualdata[$i];
        // var_dump ($qualdata);
        $paper_url_qual = $paper_dir . $keyq->file;
        $paper_sql_qual = "INSERT INTO `qualification`(`Login`, `Title`, `From_Date`, `To_Date`, `Marksheet_Url`)
                        VALUES ('$login','$keyq->name','$keyq->from',' $keyq->to','$paper_url_qual')";
        move_uploaded_file($_FILES['qual_file'.$i]['tmp_name'],$paper_url_qual);


        if ($conn->query($paper_sql_qual)){
            echo "Qualification Recorded<br>";
        }
        else{
            echo "Error";
        }
        // echo "$key->title - $key->name_of_journal - $key->impact_factor - $paper_url  <br>";
    }
    // _____________________________qualification ends__________________________
    
    // ___________________________extra qualification___________________________

    $exqualdata = json_decode($_POST['ex_qual_data']);

        $paper_dir = "C:/Users/computer solution/Desktop/Calculator/";
        for ($i=0; $i < count($exqualdata); $i++) { 

            $keye = $exqualdata[$i];
            var_dump ("extra_qual_file");
            $paper_url_ex = $paper_dir . $keye->file;
            $paper_sql_ex = "INSERT INTO `extra_curricular_qualification`(`Login`, `Title`, `From_Date`, `To_Date`, `Marksheet_Url`)
                            VALUES ('$login','$keye->name','$keye->from',' $keye->to','$paper_url_ex')";
            move_uploaded_file($_FILES['extra_qual_file'.$i]['tmp_name'],$paper_url_ex);


            if ($conn->query($paper_sql_ex)){
                echo "Extra curricular Redorded<br>";
            }
            else{
                echo "Error";
            }
            // echo "$key->title - $key->name_of_journal - $key->impact_factor - $paper_url  <br>";
        }

    // _____________________________extra qualification ends__________________________


        $sql1="INSERT INTO personal_info(Login, Name, Dob, Email, Pan_No, Pan_Url, Aadhar_No, Aadhar_Url, Joining_Date, Appointment_Letter_Url,Research_Profile_Url,Research_Profile_Url_2,Research_Profile_Url_3,Research_Profile_Url_4) VALUES('";
	$sql1 .= $login ."','" .$name."','" .$date."','" .$email."','" .$panno. "','" .$pan_url_store. "','" .$aadharno. "','" .$aadharurl. "','" .$joining. "','" .$appoint."','" .$research1."','" .$research2."','" .$research3. "','" .$research4. "')";
    if(mysqli_query($conn,$sql1)){
        echo"<script>alert(\"Successfuly Added\")</script>";
    }
    else{
        echo "error occured";
    }



















        foreach ($_POST as $key => $value) {
            $value = json_encode($value);
            echo "<p><b>$key</b>-:$value</p>";
        }
        echo "FILES<br>";
        foreach ($_FILES as $key => $value) {
            $value = json_encode($value);
            echo "<p><b>$key</b>-:$value</p>";
        }
    }





?>