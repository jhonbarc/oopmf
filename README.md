# README #

Este es sólo una versión muy básica de micro framework para PHP

### Qué hace esta cosa? ###

* Sólo recibe por POST
* El GET envía la función a utilizar y parámetros si los hay
* Está hecho para simplemente enviar archivos json a la vista

### Cómo lo hace? ###

* Cópialo en tu servidor
* La ruta para enviar datos desde javascript debe ser www.midominio/controllers/mi_carpeta/
* Dale a la carpeta un nombre descriptivo (Productos, Login...)
* Ten en cuenta mayúsculas y minúculas
* crea tu controlador en un archivo PHP
* No escribas la extensión .php, sólo pasa el get con la función y los parámetros GET si existen.
* crea tus funciones dentro y recuerda mandar por get el nombre de la función ejemplo www.midominio/controllers/mi_carpeta/archivoPHP?f=mi_funcion

