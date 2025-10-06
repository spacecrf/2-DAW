🚀 Instalación del entorno LAMP (Linux, Apache, MySQL, PHP)

Este documento describe los pasos básicos para instalar y comprobar el correcto funcionamiento de Apache, MySQL y PHP en un sistema basado en Linux.

📋 Resumen de pasos
🔧 Servicio	🖥️ Comando de instalación	✅ Comprobación
Apache	sudo apt install apache2	Abrir http://localhost
MySQL	sudo apt install mysql-server	sudo mysql
PHP	sudo apt install php libapache2-mod-php php-mysql	php -v
Reinicio Apache	sudo systemctl restart apache2	sudo systemctl status apache2
📌 Instalación de Apache

Instalamos Apache con:

sudo apt install apache2


Para comprobar que funciona, abrimos el navegador y escribimos:

http://localhost


➡️ Si aparece la página de bienvenida de Apache, la instalación se realizó correctamente.

📌 Instalación de MySQL

Instalamos MySQL con:

sudo apt install mysql-server


Entramos a la consola de MySQL para verificar:

sudo mysql


Si accede sin errores 👉 está correctamente instalado.
Para salir:

exit;

📌 Instalación de PHP

Instalamos PHP con los módulos necesarios para Apache y MySQL:

sudo apt install php libapache2-mod-php php-mysql


Verificamos la versión instalada con:

php -v

📌 Reinicio de Apache

Finalmente reiniciamos Apache para aplicar los cambios:

sudo systemctl restart apache2 && sudo systemctl status apache2


✅ Con esto ya tienes instalado un entorno LAMP completo y listo para comenzar a trabajar con proyectos web en Linux.



