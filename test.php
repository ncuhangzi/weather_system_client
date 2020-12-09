<?php
    header('Content-type: application/json');
    $json = array("jimmy"=>"handsome");
    echo json_encode($json);

?>
<!-- ps 這個檔案要在 xampp 上跑喔，並且要在 /api/裡面 -->
