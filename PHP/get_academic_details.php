<?php
    if(isset($_POST)){
        // echo json_encode($_POST);
        foreach ($_POST as $key => $value) {
            # code...
            $value = json_encode($value);
            echo "<p><b>$key</b>-:$value</p>";
        }

        echo '<hr>';
        echo "Files:<br>";
        // echo json_encode($_FILES);
        foreach ($_FILES as $key => $value) {
            # code...
            $value = $value["name"]."  ".$value['error'];
            echo "<p><b>$key</b>-:$value</p>";
        }
        // Main Code
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
        foreach ($data as $key ) {
            echo "$key->title - $key->name_of_journal - $key->impact_factor - $key->paper_name  <br>";
        }
        // var_dump($data[1]);
        // Databse Connection

        require('config.php');
        

       

    }
?>