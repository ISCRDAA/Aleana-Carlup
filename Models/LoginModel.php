<?php

class LoginModel extends Mysql {
    private $strUsuario;
    private $strPassword;

    public function __construct(){
        parent::__construct();
    }

    public function loginUser(string $usuario, string $password){
        $this->strUsuario = $usuario;
        $this->strPassword = $password;

        $sql = "SELECT idpersona,status FROM z_persona WHERE 
        email_user = '$this->strUsuario' and 
        password = '$this->strPassword' and 
        status != 0 ";

        $request = $this->select($sql);
        return $request;

    }
}


?>