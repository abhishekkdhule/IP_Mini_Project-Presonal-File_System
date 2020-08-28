<?php
    if(isset($_POST)){
        echo $_POST['data'];
        $data = json_encode($_POST['data']);

        echo '<hr>';
        echo "Files:<br>";
        echo json_encode($_FILES);
        

    }
?>