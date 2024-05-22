<?php
    class Produccion extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function produccion()
        {
            $data['page_tag'] = "Produccion";
            $data['page_title'] = "Produccion <samll>Aleana&Carlup</samll>";
            $data['page_name'] = "produccion";
            $this -> views -> getView($this,"produccion",$data);
        }
    }
?>