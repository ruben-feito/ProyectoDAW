# Proyecto DAW
**Restaurante El Rincón del 'Sin'.**
---

Rubén F., Alberto J. y Jesús M.

**DEFINICION DEL PROBLEMA:** <br />
---
Desarrollar un sitio web responsivo y lo mas accesible posible de una empresa de restauración. Se tratará de una web en una sola página donde los enlaces redireccionarán a sí misma, pero en diferente altura. <br />
Contará con un menú y las opciones de: Inicio, Comidas, Carta, Pedidos, Reservas y Contacto. Además, habrá que añadir comentarios de clientes y enlaces a redes sociales.<br />
La gama de colores predominante deberán ser los verdes en tonos pasteles, crema y/o colores combinables.
Se necesita una aplicacion secundaria para el administrador.

**OBJETIVOS:** <br />
---
Deberá dar soporte visual personalizado a los dispositivos más comúnmente empleados véase terminales móviles, tabletas y ordenadores de sobremesa:
- De 0px a 760px para móviles.
- De 761px a 1024px para tabletas.
- De 1025px en adelante para ordenadores.<br />

División de la página:
- Inicio: hará volver a la parte más alta del documento y en el que habrá un texto sobre los propietarios y la filosofía de negocio.
- Comidas: tendrá un slider de imágenes de platos del establecimiento y un breve texto.
- Carta: contendrá un breve texto y un enlace a la carta descargable en .pdf.
- Pedidos: Sera un formulario dinámico de pedidos contra una base de datos MySQL por medio de PHP. Se creará una sesión según el email introducido para poder hacer el pedido para después ordenar el pedido según un determinado método de pago. Se harán dos desplegables para los platos usando AJAX. El pago en efectivo se hará sin conplicaciones pero el pago con tarjeta se hará mediante una pasarela de pago (redsys).
- Reservas: será un formulario dinámico de reservas contra una base de datos MySQL por medio de PHP. El local tendrá un numero de mesas disponibles para reserva que se irán llenando a medida que se realicen las reservas online.
- Contacto: poseerá un mapa indicando el lugar físico del restaurante e información básica sobre horarios y dirección.
- Los comentarios de clientes serán un slider.
- Los enlaces de RRSS redirigirán a las principales del servicio al no disponer de unas propias.
- La aplicacion del administrador esta en /admin.php con las funciones básicas de administración.

**ENTORNO DE DESARROLLO:**<br />
---
El repositorio tiene incorporado su propio entorno de desarrollo con **Vagrant**, es una copia exacta del entorno de producción.
- ubuntu/trusty64 (14.04.6 LTD)
- apache2 (2.4.7)
- mysql 5.5.62
- php 5.5.9
- phpmyadmin
- ssmtp
- git<br />
Para iniciar o acceder la máquina Guest debemos estar situados en el directorio de trabajo de la máquina HOST y abrir un terminal.<br />
- Para iniciar: `vagrant up` (la primera vez tarda más)<br />
- Para parar: `vagrant halt` 
- Para borrar: `vagrant destroy` 
- Para acceder a la máquina GUEST: `vagrant ssh` _Pass: vagrant_
- Directorio de trabajo en máquina GUEST: `/var/www/html/`
- Credenciales MySQL: `User: root` `Pass: rootroot`
- IP acceso desde la máquina HOST: `192.168.33.10`
- Acceso a phpmyadmin desde la máquina HOST: `192.168.33.10/phpmyadmin/`
- Tarjeta con pago válido:
  - Numeración: 4548812049400004
  - Caducidad: 12/20
  - Código CVV2: 123
- Tarjeta con pago no válido
  - Numeración: 5576440022788500
  - Caducidad: 12/20
  - Código CVV2: 123

**BIBLIOGRAFÍA:**
---
- https://codepen.io/
- https://colourco.de/
- https://dev.mysql.com/doc/
- https://www.php.net/manual/es/
- https://www.w3schools.com/
- https://es.stackoverflow.com/
- https://developer.mozilla.org/es/docs/Web
- https://pagosonline.redsys.es/desarrolladores.html
- https://www.jose-aguilar.com/blog/como-implementar-una-pasarela-de-pago-mediante-tarjeta-de-credito-con-php/
- https://www.raulprietofernandez.net/blog/webs/como-integrar-una-pasarela-de-pago-tpv-redsys-con-php

