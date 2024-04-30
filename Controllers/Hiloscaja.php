<?php
    class Hiloscaja extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hiloscaja()
        {
            $data['page_tag'] = "Hilos por Caja";
            $data['page_title'] = "Hilos por caja <small>Aleana&Carlup</small>";
            $data['page_name'] = "hiloscaja";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hiloscaja",$data);
        }
    }
?>