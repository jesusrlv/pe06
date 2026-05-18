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
    SUM(CASE WHEN total_docs != 11 OR total_docs IS NULL THEN 1 ELSE 0 END) AS incompletos
FROM (
    SELECT usr.id, COUNT(documentos.id_ext) AS total_docs
    FROM usr 
    LEFT JOIN documentos ON usr.id = documentos.id_ext
    WHERE usr.perfil = 1
    GROUP BY usr.id
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

// edades
$sqlEdades = "SELECT edad as edad, COUNT(*) as total FROM usr WHERE perfil = 1 GROUP BY edad ORDER BY edad";
$resultEdades = $conn->query($sqlEdades);
$edades = [];
while ($row = $resultEdades->fetch_assoc()) {
    $edades[] = $row;
}

// municipios
$sqlMunicipios = "SELECT municipio.municipio as municipio, COUNT(*) as total FROM usr 
INNER JOIN municipio ON usr.municipio = municipio.id
WHERE usr.perfil = 1 GROUP BY municipio.municipio ORDER BY total DESC";
$resultMunicipios = $conn->query($sqlMunicipios);
$municipios = [];
while ($row = $resultMunicipios->fetch_assoc()) {
    $municipios[] = $row;
}

echo json_encode([
    
    'totalPostulantes' => $totalPostulantes,
    'totalCompletos' => $totalCompletos,
    'totalIncompletos' => $totalIncompletos,
    'totalMunicipios' => $totalMunicipios,
    'hombres' => $hombres,
    'mujeres' => $mujeres,
    'categorias' => $categorias,
    'edades' => $edades,
    'municipios' => $municipios
    ]);

?>