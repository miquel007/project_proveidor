# project_proveidor

# per inicialitzar el projecte primer has dejecutar la comanda per crear una DDBB
	
php bin/console doctrine:database:create

# un cop creat la DDBB, cal ejecuta la migració

php bin/console doctrine:migrations:migrate

/*documentacio del projecte
* Nuestro departamento de contabilidad necesita poder introducir en nuestro sistema los datos de
* los proveedores con los que trabajamos habitualmente, así que nos han solicitado una aplicación
* que les permita hacerlo de forma rápida y sencilla.
*/
