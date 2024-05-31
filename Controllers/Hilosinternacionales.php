<?php
    class Hilosinternacionales extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hilosinternacionales()
        {
            $data['page_tag'] = "Hilos Internacionales";
            $data['page_title'] = "Hilos Internacionales <small>Aleana&Carlup</small>";
            $data['page_name'] = "hilosinternacionales";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hilosinternacionales",$data);
        }
    }
?>