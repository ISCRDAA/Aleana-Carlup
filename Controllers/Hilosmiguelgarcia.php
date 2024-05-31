<?php
    class Hilosmiguelgarcia extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hilosmiguelgarcia()
        {
            $data['page_tag'] = "Hilos Miguel García";
            $data['page_title'] = "Hilos Miguel García <small>Aleana&Carlup</small>";
            $data['page_name'] = "hilosmiguelgarcia";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hilosmiguelgarcia",$data);
        }
    }
?>