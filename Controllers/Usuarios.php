<?php
    class Usuarios extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function Usuarios()
        {
            $data['page_tag'] = "Usuarios";
            $data['page_title'] = "USUARIOS <small>Aleana&Carlup</small>";
            $data['page_name'] = "usuarios";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "usuarios",$data);
        }
    }
?>