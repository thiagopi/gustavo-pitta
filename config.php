<?php

$config_string = <<<EOT
{ 	
	"environment"             : "PROD",
	"app_url"				  : "http://www.gustavopitta.com.br/",
	"log_path"                : "framework-files/storage/logs",
	"debug_database"		  : true,
	"email_smtp_server"       : {
		"driver"              : "smtp",
		"host"                : "",
		"port"                : "465",
		"username"            : "contatosite@gustavopitta.com.br",
		"password"            : "",
		"encryption"          : "ssl",
		"from_address"        : "contatosite@gustavopitta.com.br",
		"from_name"           : "Gustavo Pitta"
	},

	"databases" : [
		{ 
		  "alias"  : "gustavopitta",
		  "host"   : "",
		  "db"     : "",
		  "user"   : "",
 	      "passwd" : "",
 	      "port"   : 3306
		}

	]
}
EOT;

date_default_timezone_set('America/Sao_Paulo');




