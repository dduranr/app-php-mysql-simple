# Simple aplicación PHP + MySQL

## Requisitos
- MySQL 8.0.30 o compatible.
- PHP >= 8.1.10.
- Navegador web de última generación y actualizado a su versión más reciente.


## Instalación
Descargar aplicativo
- Abrir una terminal/shell y dirigirse a la carpeta pública de su servidor web.
- Ejecutar el comando:
```sh
git clone https://github.com/dduranr/app-php-mysql-simple.git
```
- El comando anterior habrá creado la carpeta *app-php-mysql-simple*.

Crear base de datos
- Abrir su cliente de base de datos (por ejemplo Workbench).
- Ejecutar el script /db.sql en el cliente de base de datos, lo cual creará un esquema llamado *base_de_datos*.

## Configurar
Base de datos
- Dentro del archivo /db.php se definen las variables que hacen referencia al host, name, user y pass de la base de datos. Cambiar esos valores de acuerdo a su ambiente. 

## Ejecutar
- Con el servidor web activo, abrir el navegador web.
- Acceder a la URL del aplicativo. Qué URL sea, depende de dónde se haya descargado el proyecto y del puerto donde se escuche el servidor web. Aquí un par de ejemplos de cómo podría verse la URL:

| # | URL |
| ------ | ------ |
| 1 | http://localhost/simple-app-php-mysql/ |
| 2 | http://localhost:8080/simple-app-php-mysql/ |


## Licencia

MIT

**Software libre, ¡Yeeeah!**
