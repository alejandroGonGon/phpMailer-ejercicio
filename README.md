# NETLFIX 2🍿

### Pre requisitos:
* Tener instalado Postman.
* Tener instalado [XAMPP](https://www.apachefriends.org/es/download.html).
* Tener un navegador web recomendado: [Chrome](https://www.google.com/intl/es/chrome/).
* Tener instalado [GIT](https://git-scm.com/downloads/).
* Inicie los servicios MYSQL y Apache en XAMPP.
* Abra C:\xampp\htdocs y clone el reporsitorio ```git clone https://github.com/alejandrogon1418/movies-php.git```
* Abra la consola en XAMPP y escriba lo siguiente ```"mysql -u root -p < C:\xampp\htdocs\...\databasepeliculas.sql"``` (agregando la ruta absoluta hacia el archivo databasepeliculas.sql).
* Editar las siguientes variables de entorno del archivo config.inc.php ubicado en /code/mailer/config.inc.php.

```
//Variables de Email
define('REMITENTE',  "Email");
define('REMITENTE_NAME',  "Nombre"); 
define('CLAVE', "Contraseña");
define('RESPONDE_A', "Email");
```
### Uso:
* Abra Postman.
* Importar el archivo "Api peliculas.postman_collection.json" ubicado en la raíz del proyecto.
- Para ello dirigase a File -> Import.

![image](https://user-images.githubusercontent.com/60719478/120862314-1c29d280-c55f-11eb-883e-3fcd3c7bff7e.png)

-Seleccione el archivo y confirme la carga.

![image](https://user-images.githubusercontent.com/60719478/120862516-79258880-c55f-11eb-8104-d59976a2beef.png)

-Ahora debería poder visualizar los archvios.

![image](https://user-images.githubusercontent.com/60719478/120862611-9d816500-c55f-11eb-8bbf-28c62eb52d56.png)

### Metodo GET para obtener todas las películas

![image](https://user-images.githubusercontent.com/60719478/120862864-0668dd00-c560-11eb-8181-0460ae939b24.png)

-Haciendo uso de la url llamamos al archvio apiPeliculas.php dónde el mismo nos devolverá todas las películas en formato JSON.

### Método POST para crear una película

![image](https://user-images.githubusercontent.com/60719478/120863111-695a7400-c560-11eb-9f15-6ea704f00426.png)

-Haciendo uso de la inserción por columnas de Postman, complete cada una de ellas para ingresar una nueva película en la base de datos.

### Método GET para obtener una única película

![image](https://user-images.githubusercontent.com/60719478/120863287-ab83b580-c560-11eb-8b62-da75a7fe0899.png)

-Haciendo uso de la url llamamos al archivo apiPeliculas.php dónde el mismo nos devolverá la información recuperada de la película que buscamos en formato JSON.
