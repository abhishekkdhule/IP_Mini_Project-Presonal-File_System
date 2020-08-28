<?php
    if(isset($_POST)){
        echo json_encode($_POST['data']);
        echo "<hr>";
        echo json_encode($_FILES);
    }

?>