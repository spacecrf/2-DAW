Apache utilizará el puerto 81 además del 80
Para esta actividad usaremos el comando: 
sudo nano /etc/apache2/ports.conf
![paso1](./imgs/img1.png)

y cambiaremos la línea:
Listen 80
a
Listen 80
Listen 81
![paso2](./imgs/img2.png)

Añadir el dominio “marisma.intranet” en el fichero “hosts”

Para ello, editamos el fichero “hosts” con:
sudo nano /etc/hosts
![paso3](./imgs/img3.png)

Añadimos la siguiente línea:
127.0.0.1	marisma.intranet
![paso4](./imgs/img4.png)

Cambia la directiva “ServerTokens” para mostrar el nombre del producto.
Para ello usarmos: 
sudo nano /etc/apache2/conf-available/security.conf
![paso5](./imgs/img5.png)

Cambiamos la línea:
ServerTokens OS
a
ServerTokens Full
![paso6](./imgs/img6.png)

Crea un directorio “prueba” y otro directorio “prueba2”. Incluye un par de páginas en cada una de ellas.

Para crear los directorios usamos:
sudo mkdir /var/www/html/prueba
sudo mkdir /var/www/html/prueba2
![paso7](./imgs/img7.1.png)

Para crear las páginas usamos:
sudo nano /var/www/html/prueba/index.html
sudo nano /var/www/html/prueba2/index.html
![paso8](./imgs/img7.png)
![paso9](./imgs/img8.png)
![paso10](./imgs/img9.png)

Redirecciona el contenido de la carpeta “prueba” hacia “prueba2”

Para ello, editamos el fichero “000-default.conf” con:
sudo nano /etc/apache2/sites-available/000-default.conf
![paso11](./imgs/img10.png)

Añadimos la siguiente línea:
Redirect /prueba /prueba2
![paso12](./imgs/img11.png)

Es posible redireccionar tan solo una página en lugar de toda la carpeta. Pruébalo.
Para ello, editamos el fichero “000-default.conf” con:
sudo nano /etc/apache2/sites-available/000-default.conf
![paso13](./imgs/img11.png)

Añadimos la siguiente línea:
Redirect /prueba/index.html /prueba2/index.html
![paso14](./imgs/img12.png)

Usa la directiva userdir para acceder a la carpeta “prueba” desde el navegador.
Para ello, editamos el fichero “000-default.conf” con:
sudo nano /etc/apache2/sites-available/000-default.conf
![paso15](./imgs/img11.png)

Añadimos la siguiente línea:
UserDir /var/www/html
![paso16](./imgs/img13.png)

Usa la directiva alias para redireccionar a una carpeta dentro del directorio de usuario.
Para ello, editamos el fichero “000-default.conf” con:
sudo nano /etc/apache2/sites-available/000-default.conf
![paso17](./imgs/img11.png)

Añadimos la siguiente línea:
Alias /prueba /var/www/html/prueba
![paso18](./imgs/img14.png)

¿Para qué sirve la directiva Options y dónde aparece. Comprueba si apache indexa los directorios. Si es así, ¿cómo lo desactivamos?

