1. Activar el módulo userdir
sudo a2enmod userdir
sudo systemctl restart apache2
2. Crear el directorio público en el home del usuario
mkdir ~/public_html
3. Dar permisos necesarios
chmod 711 ~
chmod 755 ~/public_html
