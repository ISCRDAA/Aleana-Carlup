<?php
    /**
    * Clase Conexion
    *
    * Esta clase maneja la conexión a la base de datos utilizando PDO.
    */
    class Conexion{
        /**
        * @var PDO|null Almacena la conexión a la base de datos.
        */
        private $conect;

        /**
        * Constructor de la Clase
        *
        * Configura la conexión a la base de datos usando los parámetros definidos en las constantes de la aplicación.
        * Establece el modo de error para lanzar excepciones en caso de problemas de conexión.
        */
        public function __construct(){
            // Construir la cadena de conexión
            $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;

            try{
                // Intentar establecer la conexión utilizando PDO
                $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);

                // Configurar PDO para lanzar excepciones en caso de errores
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // En caso de éxito, se puede imprimir un mensaje (comentado aquí)
		        //echo "conexión exitosa";
            }catch(PDOException $e){
                // En caso de error, asignar un mensaje de error y mostrar detalles en la consola
                $this->conect = 'Error de conexión';
                echo "ERROR: " . $e->getMessage();
            }
        }

        /**
        * Obtener Conexión
        *
        * Retorna la conexión establecida a la base de datos.
        *
        * @return PDO|null La conexión a la base de datos o nulo en caso de error.
        */
        public function conect(){
            return $this->conect;
        }
    }
?>