<?php

require('Datalive.php');
$live = new Datalive();
$data['worldwide'] =  $live->worldwide();
$data['country'] =  $live->countrystatistics('IN');
echo json_encode($data);



?>
