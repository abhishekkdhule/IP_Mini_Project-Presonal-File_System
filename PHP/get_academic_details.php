<?php
    if(isset($_POST)){
        // echo json_encode($_POST);
        foreach ($_POST as $key => $value) {
            # code...
            $value = json_encode($value);
            echo "<p><b>$key</b>-:$value</p>";
        }
        $data = json_encode($_POST['data']);

        echo '<hr>';
        echo "Files:<br>";
        // echo json_encode($_FILES);
        foreach ($_FILES as $key => $value) {
            # code...
            $value = $value["name"]."  ".$value['error'];
            echo "<p><b>$key</b>-:$value</p>";
        }

        

    }
?>