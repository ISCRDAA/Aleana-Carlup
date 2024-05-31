<?php
    class Hiloseuros extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hiloseuros()
        {
            $data['page_tag'] = "Hilos Euros";
            $data['page_title'] = "Hilos Euros <small>Aleana&Carlup</small>";
            $data['page_name'] = "hiloseuros";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hiloseuros",$data);
        }
    }
?>