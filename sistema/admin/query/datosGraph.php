<?php

include('qc.php');

// conteo total
$sql = "SELECT COUNT(*) as total FROM usr WHERE perfil = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPostulantes = $row['total'];

// sexo
$query = "SELECT 
            SUM(CASE WHEN SUBSTRING(curp, 11, 1) = 'H' THEN 1 ELSE 0 END) AS hombres,
            SUM(CASE WHEN SUBSTRING(curp, 11, 1) = 'M' THEN 1 ELSE 0 END) AS mujeres,
            COUNT(*) AS total
          FROM usr WHERE perfil = 1"; // Cambia "usuarios" por el nombre de tu tabla
$resultado = $conn->query($query);
$datos = $resultado->fetch_assoc();
$hombres = $datos['hombres'];
$mujeres = $datos['mujeres'];

// completos e incompletos
$sqlCompletos = "SELECT 
    SUM(CASE WHEN total_docs = 11 THEN 1 ELSE 0 END) AS completos,
    SUM(CASE WHEN total_docs < 11 THEN 1 ELSE 0 END) AS incompletos
FROM (
    SELECT COUNT(*) AS total_docs 
    FROM documentos 
    GROUP BY id_ext
) AS subconsulta";
$resultCompletos = $conn->query($sqlCompletos);
$rowCompletos = $resultCompletos->fetch_assoc();
$totalCompletos = $rowCompletos['completos'];
$totalIncompletos = $rowCompletos['incompletos'];

// municipios
$sqlMunicipios = "SELECT COUNT(DISTINCT municipio) as total_municipios FROM usr WHERE perfil = 1";$resultMunicipios = $conn->query($sqlMunicipios);
$rowMunicipios = $resultMunicipios->fetch_assoc();
$totalMunicipios = $rowMunicipios['total_municipios'];

// categorias
$sqlCategorias = "SELECT categorias.nombre, COUNT(*) as total FROM usr
INNER JOIN categorias ON usr.categoria = categorias.id
WHERE usr.perfil = 1 GROUP BY categorias.nombre ORDER BY categorias.id";
$resultCategorias = $conn->query($sqlCategorias);
$categorias = [];
while ($row = $resultCategorias->fetch_assoc()) {
    $categorias[] = $row;
}

echo json_encode([
    
    'totalPostulantes' => $totalPostulantes,
    'totalCompletos' => $totalCompletos,
    'totalIncompletos' => $totalIncompletos,
    'totalMunicipios' => $totalMunicipios,
    'hombres' => $hombres,
    'mujeres' => $mujeres,
    'categorias' => $categorias
    ]);

?>