<?php
    class Dashboard extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function dashboard()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = "Dashboard - Aleana&Carlup";
            $data['page_title'] = "Dashboard - Aleana&Carlup";
            $data['page_name'] = "dashboard";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "dashboard",$data);
        }
    }
?>