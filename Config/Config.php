<?php
    //define("BASE_URL", "http://localhost:8008/Angel/Aleana-Cartup/");
	
    const BASE_URL = "http://localhost:80/Aleana-Carlup";
	//const BASE_URL = "https://carlupyaleana.com.mx/";

	//Zona horaria
	date_default_timezone_set('America/Mexico_City');

    //Datos de conexión a Base de Datos
	const DB_HOST = "162.241.61.205";
	const DB_NAME = "carlupya_taller";
	const DB_USER = "carlupya_roberto";
	const DB_PASSWORD = "i6qOqXp40pA";
    //const DB_PORT = "3308";
	const DB_CHARSET = "utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "MXN";
	const CURRENCY = "MXN";
?>