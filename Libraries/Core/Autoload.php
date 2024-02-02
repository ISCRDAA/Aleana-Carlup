<?php
    /**
    * Autoload Class
    *
    * Este archivo implementa un cargador automático de clases utilizando la función spl_autoload_register.
    * Carga automáticamente las clases cuando se instancian, buscando los archivos en la carpeta Core.
    *
    * @param string $class El nombre de la clase que se va a cargar.
    */
    spl_autoload_register(function($class){
        // Verificar si el archivo de la clase existe antes de cargarlo
        // Libraries/Core/home.php
        if(file_exists("Libraries/".'Core/'.$class.".php"))
        {
            // Incluir el archivo de la clase
            require_once("Libraries/".'Core/'.$class.".php");
        }
    });
?>