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

