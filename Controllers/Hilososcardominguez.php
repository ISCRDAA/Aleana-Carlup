<?php
    class Hilososcardominguez extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hilososcardominguez()
        {
            $data['page_tag'] = "Hilos Óscar Domínguez";
            $data['page_title'] = "Hilos Óscar Domínguez <small>Aleana&Carlup</small>";
            $data['page_name'] = "hilososcardominguez";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hilososcardominguez",$data);
        }
    }
?>