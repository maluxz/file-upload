# CyberUploader 🚀

Secure file uploads with a stylish Mr. Robot-inspired progress bar.

## Configuración para Subir Archivos de Gran Tamaño

Este proyecto permite la carga de archivos de gran tamaño desde el navegador. Sigue estos pasos para configurar tu entorno local.

### 1. Configuración de XAMPP

Asegúrate de tener XAMPP instalado en tu máquina. Puedes descargarlo [aquí](https://www.apachefriends.org/index.html).

### 2. Ajustes en `php.ini`

Abre el archivo `php.ini` ubicado en `xampp\php` (o `xampp\apache\bin` si estás utilizando la versión integrada con Apache) y ajusta las siguientes directivas:

```ini
post_max_size = 100M
upload_max_filesize = 100M
max_execution_time = 300
max_input_time = 300
memory_limit = 128M
```
### 3. Reinicia el Servidor

Reinicia tu servidor web (Apache en el caso de XAMPP) para que las nuevas configuraciones surtan efecto.
