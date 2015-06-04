# slider
/!\ **Atención!** Este proyecto está en desarrollo. Sólo lo recomiendo para testeo o aprendizaje.

/!\ **Attention!** This proyect is under developement. I recommend it for testing or learning only.

## Descripción
*Slider* es un proyecto para realizar una presentación simple con unnos eventos introducidos a través de un backoffice.

## Librerías, plugins y frameworks utilizados
### Backend
- [Codeigniter 3.0](http://www.codeigniter.com/) - Framework base

### Frontend
- [Bootstrap](http://getbootstrap.com/) - Framework de diseño
- [Bootswatch - Lumen Theme](http://bootswatch.com/) - Tema visual
- [PNotify](http://sciactive.com/pnotify/) - Sistema de notificaciones
- [Bootstrap-datepicker](https://github.com/eternicode/bootstrap-datepicker) - Selector de fechas
- [jQuery](http://jquery.com/)

## Requisitos
### Servidor
Requisitos mínimos:
- Servidor web apache 2.4.7
- PHP v5.5.9
- Mysql 5.6.19

### Subida de imágenes
- Necesita la librería GD de PHP instalada y activada, sino no subirá las imágenes.
- Necesita permisos de escritura en la carpeta `./img/uploaded/`

### Sesiones y logueo
- Las contraseñas se guardan en la base de datos de la siguiente manera: `sha1(contraseña_original + salt)`. Explicación:
	- `contraseña_original` es la que introduce el usuario.
	- Se le concatena `salt` que es una cadena establecida en el fichero `./application/config/config.php`. Recordar que si se cambia la `salt` habrá que resetear las contraseñas.
	- Al producto anterior se le hace un hash con `sha1` y el resultado es lo que se almacena en la BD.

### Mod_rewrite y .htaccess
- Es necesario tener habilitado el mod_rewrite de apache y el .htaccess para poder quitar el `index.php` de la URL. [Más info aquí.](http://www.codeigniter.com/user_guide/general/urls.html?highlight=mod_rewrite#removing-the-index-php-file)

## Configuración en explotación
A la hora de poner la aplicación en el servidor de explotación hay que recordar revisar los ficheros de configuración `database.php` y `config.php` situados en `./application/config/`, en especial todo lo relativo a claves, y contraseñas.

## Herramientas utilizadas para el desarrollo:
- Atom
- Gimp
- Inkscape
- Linux Mint
