# slider
/!\ **Atención!** Este proyecto está en desarrollo. Sólo lo recomiendo para testeo o aprendizaje.

/!\ **Attention!** This proyect is under developement. I recommend it for testing or learning only.

## Descripción
*Slider* es un proyecto para realizar una presentación simple de diapositivas introducidas a través de un backoffice.

## Librerías, plugins y frameworks utilizados
### Backend
- [Codeigniter 3.0](http://www.codeigniter.com/) - Framework base

### Frontend
- [Bootstrap](http://getbootstrap.com/) - Framework de diseño
- [jQuery](http://jquery.com/) - Manipulación del DOM, peticiones AJAX
- [Bootswatch - Lumen Theme](http://bootswatch.com/) - Tema visual
- [PNotify](http://sciactive.com/pnotify/) - Sistema de notificaciones
- [Bootstrap-datepicker](https://github.com/eternicode/bootstrap-datepicker) - Selector de fechas
- [Font Awesome](http://fortawesome.github.io/Font-Awesome/) - Fuente de Iconos
- [DataTables](https://www.datatables.net/) - Representación de datos en tablas

## Requisitos
### Servidor
Requisitos mínimos:
- Servidor web apache 2.4.7
- PHP v5.5.9
- Mysql 5.6.19

### Subida de imágenes
- Necesita la librería GD de PHP instalada y activada, sino no subirá las imágenes.
- Necesita permisos de escritura en la carpeta `./img/uploaded/`

### Mod_rewrite y .htaccess
- Es necesario tener habilitado el mod_rewrite de apache y el .htaccess para poder quitar el `index.php` de la URL. [Más info aquí.](http://www.codeigniter.com/user_guide/general/urls.html?highlight=mod_rewrite#removing-the-index-php-file)

## Navegadores soportados
Sólo está testeado en los navegadores Mozilla Firefox, Google Chrome y Chromium. Internet Explorer **no** está soportado.

# Configuración
## Configuración en explotación
- A la hora de poner la aplicación en el servidor de explotación hay que recordar revisar los **ficheros de configuración** `database.php` y `config.php` situados en `./application/config/`, en especial todo lo relativo a claves, y contraseñas.
- Para adaptar el slider al **tamaño de la pantalla** hay que configurar las medidas de la misma con el `width` y `height` de la clase `.swiper-container` en el fichero `./css/visor.css`. Esto es así porque algunos navegadores tienen un bug que hace que entre cambios de disapositiva se queda atascado.

## Dar de alta nuevos tipos de eventos
### Dar de alta en la base de datos
Crear su entrada correspondiente en la tabla `tipos_eventos` con el `nombre a mostrar` y la `clase_css`.

### Subir las imágenes
Hay que subir dos imágenes al servidor.

La primera tiene que ir en `./img/slides` y es la imagen pequeña que se mostrará en la parte superior izquierda al lado del "Hoy en Soria". El tamaño recomendado es de 83 píxeles de alto.

La segunda tiene que ir en la carpeta `./img/slides_default` y es la imagen que aparecerá en la presentación cuando no se suba una imagen para ese evento. El tamaño recomendado es de 1080 píxeles de alto, el nombre del archivo tiene que ser el mismo que `clase_css` y la extensión `.jpg`.

### Estilos
Una vez definido en la base de datos y subidas las imágenes, hay que definir los estilos en el fichero `visor.css`. Suponiendo que la `clase_css` que hemos creado habría que definirlo de la siguiente manera:

	.panel-info.teatro .hoyen {
		color: #f8b40d;
	}
	.panel-info.teatro .hoyen .soria {
		color: #7b3e8c;
	}
	.panel-info.teatro .img-type {
		background-image: url('../img/slides/teatro.png');
	}
	.panel-info.teatro .header {
		border-bottom: 5px solid #7b3e8c;
	}
	.panel-info.teatro .datos {
		border-top: 3px solid #f8b40d;
		border-bottom: 3px solid #f8b40d;
	}

En la clase `.img-type` ponemos la ruta en `background-image` hacia la imagen que hemos subido en el paso anterior en la carpeta `./img/slides`.

### Contraseña
La contraseña se almacena de la siguiente manera en la base de datos:

	sha1(contraseña_del_usuario + SALT);


- `contraseña_del_usuario` es la que contraseña que introduce el usuario.
- Se le concatena `SALT` que es una cadena establecida en el fichero `./application/config/config.php`. Recordar que si se cambia la `salt` habrá que resetear las contraseñas.
- Al producto anterior se le hace un hash con `sha1` y el resultado es lo que se almacena en la BD.

# Uso
## Visor
Cargando la URL principal hacia el index cargará el visor. El visor comprueba automáticamente cada X tiempo actualizaciones de eventos. En caso de que encuentre actualizaciones recargará la página.

Para poner el navegador a pantalla completa hay que pulsar `F11`.

## Administración
Añadir a la URL `/administracion` y se accederá al panel de administración donde se podrán dar de alta, modificar y borrar eventos.

Si el usuario no se ha identificado en el sistema se le pedirá loguearse.
