<?php
    /**
    * Clase Controllers
    *
    * Esta clase es una clase base para controladores en el modelo MVC.
    */
    class Controllers
    {
        /**
        * Constructor de la Clase
        *
        * Inicializa la instancia de la clase Views y carga automáticamente el modelo asociado al controlador.
        */
        public function __construct()
        {
            $this -> views = new Views();
            $this -> loadModel();
        }

        /**
        * Cargar Modelo
        *
        * Carga el modelo asociado al controlador si el archivo del modelo existe.
        */
        public function loadModel()
        {
            // Construir el nombre de la clase del modelo basado en el nombre del controlador
            $model = get_class($this)."Model";

            // Construir la ruta del archivo del modelo
            $routClass = "Models/".$model.".php";

            // Verificar si el archivo del modelo existe antes de cargarlo
            if(file_exists($routClass)){
                // Incluir el archivo del modelo
                require_once($routClass);

                // Instanciar el modelo
                $this -> model = new $model();
            }
        }
    }
?>