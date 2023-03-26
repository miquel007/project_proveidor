# project_proveidor

* Per inicialitzar el projecte primer has d'ejecutar la comanda per crear una DDBB
```	
	php bin/console doctrine:database:create
```
* Per crear els camps en la DDBB, ejecuta la migració
```
	php bin/console doctrine:migrations:migrate
```
* Per navegar nomes utilitzant el 'localhost', anar a la carpeta 'C:\xampp\apache\conf\extra', obrir el doc 'httpd-vhosts.conf' i al final de fitxer escriure:
```
	<VirtualHost *:80>    
	    DocumentRoot "URLdelProjecte"
	</VirtualHost>
```
