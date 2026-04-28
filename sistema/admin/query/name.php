<?php
include('qc.php');

$name = "SELECT * FROM usr WHERE id = '$idPostulante'";
$resultadoName = $conn->query($name);
$rowName = $resultadoName->fetch_assoc();

?>