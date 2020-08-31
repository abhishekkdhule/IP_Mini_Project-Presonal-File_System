<?php
    if(isset($_POST)){
        // Debug
        // echo json_encode($_POST);
        foreach ($_POST as $key => $value) {
            # code...
            $value = json_encode($value);
            echo "<p><b>$key</b>-:$value</p>";
        }

        echo '<hr>';
        echo "Files:<br>";
        echo json_encode($_FILES);
        foreach ($_FILES as $key => $value) {
            # code...
            $value = $value["name"]."  ".$value['error'];
            echo "<p><b>$key</b>-:$value</p>";
        }
        // Main Code
        // Databse Connection

        require('config.php');

        $data = json_decode($_POST['data']);
        $year = $_POST['year'];
        $dept = $_POST['dept'];
        $degree = $_POST['degree'];
        $specialization = $_POST['specialization'];
        $assoc_type =$_POST['assoc_type'];
        // Boolean variables
        $curr_assoc = $_POST['curr_assoc'] == "yes";
        $phd_guidance = $_POST['phd_guidance'] == "yes";
        $is_hod = $_POST['hod'] == "yes";
        $received_phd = $_POST['received_phd'] =="yes";

        // Store Papers
        $paper_dir = "D:/IP Mini Project - Personal File System/UPLOADS/Papers/";
        for ($i=0; $i < count($data); $i++) { 

            $key = $data[$i];
            $paper_url = $paper_dir . $key->paper_name;
            $paper_sql = "INSERT INTO `research_paper`(`Login`, `Title`, `Name_Of_Journal`, `Impact_Factor`, `Publication_Year`, `Paper_Url`)
                            VALUES ('Jayesh@2812','$key->title','$key->name_of_journal',' $key->impact_factor','$year','$paper_url')";
            move_uploaded_file($_FILES['paper'.$i]['tmp_name'],$paper_url);


            if ($conn->query($paper_sql)){
                echo "Papers Submitted<br>";
            }
            else{
                echo "Error";
            }
            echo "$key->title - $key->name_of_journal - $key->impact_factor - $paper_url  <br>";
        }

        // var_dump($data[1]);


        

       

    }
?>