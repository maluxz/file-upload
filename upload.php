<?php
// Configuración para permitir archivos de gran tamaño
ini_set('post_max_size', '200M');
ini_set('upload_max_filesize', '200M');

// Directorio de destino para guardar los archivos
$uploadDir = 'uploads/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $tempFile = $_FILES['file']['tmp_name'];
    $targetFile = $uploadDir . $_FILES['file']['name'];

    move_uploaded_file($tempFile, $targetFile);

    echo 'Archivo subido correctamente';
} else {
    echo 'Error al subir el archivo';
}
?>
