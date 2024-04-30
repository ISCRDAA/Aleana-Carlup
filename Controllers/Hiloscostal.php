<?php
    class Hiloscostal extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hiloscostal()
        {
            $data['page_tag'] = "Hilos por Costal";
            $data['page_title'] = "Hilos por costal <small>Aleana&Carlup</small>";
            $data['page_name'] = "hiloscostal";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hiloscostal",$data);
        }
    }
?>