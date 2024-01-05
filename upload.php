<?php
// Configuración para permitir archivos de gran tamaño
ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M');

// Directorio de destino para guardar los archivos
$uploadDir = 'uploads/';
$genericFileName = 'archivo';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (!empty($_FILES['file']['name'][0])) {
    $fileCount = count($_FILES['file']['name']);
    $uploadedFiles = [];

    for ($i = 0; $i < $fileCount; $i++) {
        $tempFile = $_FILES['file']['tmp_name'][$i];
        $originalFileName = $_FILES['file']['name'][$i];
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        
        // Generar un nombre único para cada archivo
        $newFileName = $genericFileName . '_' . uniqid() . '.' . $fileExtension;
        $targetFile = $uploadDir . $newFileName;

        move_uploaded_file($tempFile, $targetFile);

        // Almacenar el nombre del archivo subido
        $uploadedFiles[] = $newFileName;
    }

    echo 'Archivos subidos correctamente. ';

    // Mostrar enlaces para descargar los archivos
    foreach ($uploadedFiles as $fileName) {
        echo '<a href="' . $uploadDir . $fileName . '" target="_blank">' . $fileName . '</a><br>';
    }
} else {
    echo 'Error al subir archivos';
}
?>
