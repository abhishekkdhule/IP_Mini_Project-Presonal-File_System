<?php
    if(isset($_POST)){
        // Debug
        // echo json_encode($_POST);
        // foreach ($_POST as $key => $value) {
        //     # code...
        //     $value = json_encode($value);
        //     echo "<p><b>$key</b>-:$value</p>";
        // }

        // echo '<hr>';
        // echo "Files:<br>";
        // echo json_encode($_FILES);
        // foreach ($_FILES as $key => $value) {
        //     # code...
        //     $value = $value["name"]."  ".$value['error'];
        //     echo "<p><b>$key</b>-:$value</p>";
        // }
        // Main Code
        // Databse Connection

        require('config.php');

        $data = json_decode($_POST['data']);
        $year = $_POST['year'];
        $dept = $_POST['dept'];
        $degree = $_POST['degree'];
        $specialization = $_POST['specialization'];
        $designation = $_POST['designation'];
        $assoc_type =$_POST['assoc_type'];
        // Boolean variables
        $curr_assoc = $_POST['curr_assoc'] ;
        $phd_guidance = $_POST['phd_guidance'] ;
        $is_hod = $_POST['hod'];
        $received_phd = $_POST['received_phd'] ;

        $loginID = 'Jayesh@2812';

        // Store Papers
        // PAPERS BASE DIR
        $paper_dir = "D:/IP Mini Project - Personal File System/UPLOADS/Papers/";
        for ($i=0; $i < count($data); $i++) { 

            $key = $data[$i];
            $paper_url = $paper_dir . $key->paper_name;
            $paper_sql = "INSERT INTO `research_paper`(`Login`, `Title`, `Name_Of_Journal`, `Impact_Factor`, `Publication_Year`, `Paper_Url`)
                            VALUES ('$loginID','$key->title','$key->name_of_journal',' $key->impact_factor','$year','$paper_url')";
            move_uploaded_file($_FILES['paper'.$i]['tmp_name'],$paper_url);


            if ($conn->query($paper_sql)){
                echo "Papers Submitted<br>";
            }
            else{
                echo "Error";
            }
            echo "$key->title - $key->name_of_journal - $key->impact_factor - $paper_url  <br>";
        }

        // Academic Year Details
        $other_dir = "D:/IP Mini Project - Personal File System/UPLOADS/others/";
        // currently associated
        if($curr_assoc == 'No'){
            $curr_assoc_url = $other_dir . '$_FILES[\'curr_assoc_doc\'][\'name\']';
            move_uploaded_file($_FILES['curr_assoc_doc']['tmp_name'],$curr_assoc_url);
        }
        else{
            $curr_assoc_url = NULL;
        }
        // Is HOD
        if($is_hod == 'Yes'){
            $hod_doc_url = $other_dir . $_FILES['hod_doc']['name'];
            move_uploaded_file($_FILES['hod_doc']['tmp_name'],$hod_doc_url);
        }
        else{
            $hod_doc_url = NULL;
        }
        // Received PhD
        if($received_phd == 'Yes'){
            $phd_doc_url = $other_dir . $_FILES['phd_doc']['name'];
            move_uploaded_file($_FILES['phd_doc']['tmp_name'],$phd_doc_url);
        }
        else{
            $phd_doc_url = NULL;
        }
        // Degree file
        $degree_url = $other_dir . $_FILES['degree_marksheet']['name'];
        move_uploaded_file($_FILES['degree_marksheet']['tmp_name'],$degree_url);
        // Designation file
        $designation_url = $other_dir . $_FILES['designation_doc']['name'];
        move_uploaded_file($_FILES['designation_doc']['tmp_name'],$designation_url);



        $AY_query = "INSERT INTO `$year`(`Srno`, `Login`, `Department`, `Highest_Degree_Title`, `Highest_Degree_Url`, `Specialization`, `Phd_Guidance`, `Phd_Received`, `Phd_Received_Url`, `Designation`, `Designation_url`, `Association_Type`, `Currently_associated`, `Currently_Association_Url`, `is_HOD`, `HOD_Appointment_Letter`)
         VALUES (1,'$loginID','$dept','$degree','$degree_url','$specialization','$phd_guidance','$received_phd','$phd_doc_url','$designation','$designation_url','$assoc_type','$curr_assoc','$curr_assoc_url','$is_hod','$hod_doc_url')";


        // var_dump($data[1]);
        if($conn->query($AY_query)){
            echo "Data Submitted";
        }
        else{
            echo "Data not saved";
            echo $conn->error;
        }

        

       

    }
?>