# PHP SMTP Sender

Este proyecto es un pequeño script en PHP diseñado para enviar correos electrónicos utilizando el protocolo SMTP. Es ideal para pruebas rápidas, automatizaciones simples o como base para proyectos más grandes que requieren funcionalidad de envío de emails.

## 📦 Características

- Conexión a servidores SMTP autenticados.
- Envío de correos electrónicos con asunto y cuerpo personalizado.
- Basado únicamente en PHP (`mail()` no es utilizado).
- Ligero, sin dependencias externas (usa `fsockopen`).

## 🚀 Requisitos

- PHP 5.6 o superior.
- Acceso a un servidor SMTP (como Gmail, Mailgun, SendGrid, etc.).

## ⚙️ Uso

1. Clona el repositorio:

   ```bash
   git clone https://github.com/whohe/sender.git
   cd sender
   ```
2. Abre y edita smtp.php con tus credenciales SMTP:

   ```php
    $smtp = new SMTP;
    $smtp->connect('smtp.tuservidor.com', 587); // o 465 para SSL
    $smtp->auth('tucorreo@dominio.com', 'tu_contraseña');
    $smtp->send('tucorreo@dominio.com', 'destinatario@ejemplo.com', 'Asunto del correo', 'Cuerpo del mensaje');
   ```
3. Ejecuta el script:

   ```bash
    php smtp.php
   ```
## 🛡️ Seguridad

⚠️ **No se recomienda almacenar credenciales directamente en el script para producción.**  
Considera usar variables de entorno o archivos de configuración seguros.

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## 🤝 Créditos

Creado por [whohe](https://github.com/whohe).  
Inspirado en el deseo de mantener scripts simples, sin dependencias, para tareas puntuales de envío de correos.
