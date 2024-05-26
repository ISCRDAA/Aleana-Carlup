<?php
    class Hilosmayol extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hilosmayol()
        {
            $data['page_tag'] = "Hilosmayol";
            $data['page_title'] = "Hilosmayol <small>Aleana&Carlup</small>";
            $data['page_name'] = "hilosmayol";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hilosmayol",$data);
        }

        
    }
?>