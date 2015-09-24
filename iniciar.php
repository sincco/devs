<?php
# NOTICE OF LICENSE
#
# This source file is subject to the Open Software License (OSL 3.0)
# that is available through the world-wide-web at this URL:
# http://opensource.org/licenses/osl-3.0.php
#
# -----------------------
# @author: Iván Miranda
# @version: 1.0.0
# -----------------------
# Inicia la configuración básica del frame, creando los directorios necesarios
# y un archivo de configuración con los parametros obligados
# -----------------------

require_once './Sfphp/_base.php';

if(!file_exists("./Etc/Config/config.xml")) {
	echo "Inicializando el framework...<br>";
	file_put_contents("./sfphp.md5", Sfphp_Disco::MD5("./Sfphp"));
	echo "Inicializando directorios...<br>";
	if(!is_dir("./App")) {
		mkdir("./App", 0775);
		mkdir("./App/Core", 0775);
		file_put_contents("./App/.htaccess", "Options -Indexes");
	}
	if(!is_dir("./Libs"))
		mkdir("./Libs", 0775);
	if(!is_dir("./Etc")) {
		mkdir("./Etc", 0775);
		mkdir("./Etc/Config", 0775);
		mkdir("./Etc/Logs", 0775);
		mkdir("./Etc/Sesiones", 0775);
		file_put_contents("./Etc/.htaccess", "Options -Indexes");
		file_put_contents("./Etc/Config/.htaccess", "Options -Indexes");
		file_put_contents("./Etc/Logs/.htaccess", "Options -Indexes");
		file_put_contents("./Etc/Sesiones/.htaccess", "Options -Indexes");
	}
	echo "Inicializando archivo de configuración...<br>";
	$_llave_encripcion = strtoupper(md5(microtime().rand()));
	$_config = array (
		'app' => array (
			'key' => $_llave_encripcion,
			'name' => 'sfphp',
			'company' => 'sincco.com',
		),
		'front' => array (
			'url' => sprintf("%s://%s%s",
				isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			    $_SERVER['SERVER_NAME'],
			    $_SERVER['REQUEST_URI']
			),
		),
		'bases' => array (
			'base' => array(
				'host' => 'sfphp',
				'user' => 'sfphp',
				'password' => Sfphp::encrypt('sfphp',$_llave_encripcion),
				'dbname' => 'sfphp',
				'type' => 'mysql',
				'default' => 1,
			),
			'type' => "DEFAULT",
			'name' => "sfphp",
			'ssonly' => 0,
			'inactivity' => 60,
		),
		'session' => array (
			'type' => "DEFAULT",
			'name' => "sfphp",
			'ssonly' => 0,
			'inactivity' => 60,
		),
		'dev' => array (
			'log' => 1,
			'showerrors' => 0,
			'showphperrors' => 0,
		),
	);
	if(Sfphp_Disco::arregloXML($_config,"config","./Etc/Config/config.xml"))
		echo 'Configuración básica completa.';
	else
		echo 'Hubo un error al escribir la configuración.';
} else {
	echo "El framework ya está configurado<br>Configura tu aplicación";
}
