<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .card {
            background-color: #1e1e1e;
            border: 1px solid #00ff00;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="card">
    <form action="upload.php" method="post" enctype="multipart/form-data" id="upload-form">
        <input type="file" name="file" id="file-input" />
        <button type="submit">Subir Archivo</button>
    </form>

    <div id="progress">
        <div id="progress-bar"></div>
    </div>
</div>

<script>
    document.getElementById('upload-form').addEventListener('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var progressBar = document.getElementById('progress');

        var xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', function (event) {
            if (event.lengthComputable) {
                var percentage = (event.loaded / event.total) * 100;
                progressBar.innerHTML = 'Progreso: ' + percentage.toFixed(2) + '%';
            }
        });

        xhr.upload.addEventListener('load', function () {
            progressBar.innerHTML = 'Carga completa';
        });

        xhr.open('POST', 'upload.php', true);
        xhr.send(formData);
    });
</script>

</body>
</html>
