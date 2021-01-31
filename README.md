# CONTROL DE REQUERIMIENTOS
Se trata de una aplicacion donde una gerencia de la empresa recibe requerimientos de todas las otras areas y gerencias, con el fin de evidenciar y dar una mejor respuesta en cuanto a sus estatus, frecuencias y avances en dichos requerimientos.

La aplicacion cuenta con un usuario administrador de la aplicaciones el cual podra gestionar diferentes parametros, de igual forma este podra crear distintos usuarios con sus perfiles para:

	Registrar otros usuarios y asignarles sus perfiles.
	Tomar requerimientos.
	Administrar requerimientos.
	Cambio de estatus de requerimientos.
	Asignar y reasignar requerimientos.


ESTRUCTURA DE DIRECTORIOS
-------------------
      config/             contiene las configuracion de la aplicacion.
      controllers/      contiene las clases de los controladores web.
      models/           contiene las clases de los modelos.
      views/              coniene los archivos de las vistas para la aplicacion.
      web/                contiene el script de entrada y los recursos web.

REQUERIENTOS
------------
El requisito mínimo de este proyecto es que su servidor web sea compatible con PHP mayor a la version 5.6.0. 

Y contar de igual manera con postgresql con una version mayor a la version 12.


INSTALACION
------------

### Install from an Archive File

Puede acceder a la aplicacion a traves de la siguiente URL:
~~~
http://localhost/basic/web/
~~~



CONFIGURAciION
-------------

### Base de Datos

Debera crear una base de datos nueva en postgresql con una version mayor a  la 12 y restaurarla con el archivo movilnet.sql que esta en la raiz del repositorio.

Luego se tiene que editar el archivo  `config/db.php` con datos reales para realizar la conexion a la base de datos creada previamente, por ejemplo:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
