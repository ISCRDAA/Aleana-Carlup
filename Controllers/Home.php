<?php
    class Home extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function home()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = "Aleana&Carlup";
            $data['page_title'] = "Aleana&Carlup";
            $data['page_name'] = "home";
            $data['page_content'] = "Lorem hosolas dhoasdlasd hoasd lasdh asdasldlashdlhasjdhaskjdhaskhdkjashdasdl  akshdklas ";
            //echo "Mensaje desde el controlador";
            $this -> views -> getView($this, "home",$data);
        }
    }
?>