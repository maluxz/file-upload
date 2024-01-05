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

        #file-input {
            margin-top: 10px;
            display: none;
        }

        .custom-button {
            background-color: #1e1e1e;
            color: #00ff00;
            border: 1px solid #00ff00;
            padding: 10px 20px;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #00ff00;
            color: #1e1e1e;
        }
    </style>
</head>
<body>

<div class="card">
    <form action="upload.php" method="post" enctype="multipart/form-data" id="upload-form">
        <label for="file-input" class="custom-button">Seleccionar Archivos</label>
        <input type="file" name="file[]" id="file-input" multiple />
        <button type="submit" class="custom-button">Subir Archivos</button>
    </form>

    <div id="progress">
        <div id="progress-bar"></div>
    </div>

    <div id="file-links"></div>
</div>

<script>
    document.getElementById('upload-form').addEventListener('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var progressBar = document.getElementById('progress-bar');
        var fileLinksContainer = document.getElementById('file-links');

        var xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', function (event) {
            if (event.lengthComputable) {
                var percentage = (event.loaded / event.total) * 100;
                progressBar.style.width = percentage.toFixed(2) + '%';
            }
        });

        xhr.upload.addEventListener('load', function () {
            progressBar.style.width = '100%';

            // Actualizar el DOM con los enlaces después de subir los archivos
            fileLinksContainer.innerHTML = xhr.responseText;
        });

        xhr.open('POST', 'upload.php', true);
        xhr.send(formData);
    });
</script>

</body>
</html>
