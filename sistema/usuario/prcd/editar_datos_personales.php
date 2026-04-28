<html>
<meta charset="utf-8">
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap');
    body{
        font-family: 'Montserrat', sans-serif;
    }
</style>
<?php
    session_start();
    include('../query/qc.php');

    $id = $_SESSION['id'];
    $nombre = $_POST['nombre'];
    $municipio = $_POST['municipio'];

$query = "UPDATE usr SET nombre = '$nombre', municipio = '$municipio' WHERE id = '$id'";
$resultado = $conn->query($query);

if($resultado){

    echo "<script type=\"text/javascript\">
    Swal.fire({
        icon: 'success',
        imageUrl: '../../../img/logo_injuventud_01.png',
        imageHeight: 200,
        imageAlt: 'Gobierno del estado de Zacatecas',
        title: 'Datos actualizados',
        text: 'Se actualizaron los datos',
        confirmButtonColor: '#3085d6',
        footer: 'INJUVENTUD'
    }).then(function(){window.location='../index.php';});</script>";
        }
else{
    echo "
    <script type=\"text/javascript\">
    Swal.fire({
        icon: 'error',
        imageUrl: '../../../img/logo_injuventud_01.png',
        imageHeight: 200,
        imageAlt: 'Gobierno del estado de Zacatecas',
        title: 'No se actualizaron los datos',
        text: 'Selecciona el municipio para realizar la actualización',
        confirmButtonColor: '#3085d6',
        footer: 'INJUVENTUD'
    }).then(function(){window.location='../index.php';});</script>
    ";
}

?>

</body>
</html>