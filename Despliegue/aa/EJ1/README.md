1. Crear los directorios “inf” y “adm” dentro del directorio servido por Apache
sudo mkdir /var/www/html/inf /var/www/html/adm
2. Cambiar el usuario y grupo de ambos directorios a www-data
sudo chown -R www-data:www-data /var/www/html/inf /var/www/html/adm
3. Cambiar permisos:
sudo chmod 764 /var/www/html/inf /var/www/html/adm
