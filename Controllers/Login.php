<?php
    class Login extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function login()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = "Aleana&Carlup";
            $data['page_title'] = "Aleana&Carlup";
            $data['page_name'] = "home";
            $data['page_content'] = "Lorem hosolas dhoasdlasd hoasd lasdh asdasldlashdlhasjdhaskjdhaskhdkjashdasdl  akshdklas ";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "login",$data);
        }

        public function loginUser(){
            if($_POST){
                if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
                    $arrResponse = array('status' => false, 'msg' =>'error de datos.');
                } else {
                    $strUsuario=strtolower(strClean($_POST['txtEmail']));
                    $strPassword=hash('SHA256',$_POST['txtPassword']);

                    $requestUser=$this->model->loginUser($strUsuario,$strPassword);
                    
                    
                }
                
            }
            die();

        }
    }
?>