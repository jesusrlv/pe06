<?php

include('qc.php');

$sql = "SELECT COUNT(*) as total FROM usr WHERE perfil = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPostulantes = $row['total'];

echo json_encode(['totalPostulantes' => $totalPostulantes]);

?>