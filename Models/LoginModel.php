<?php

class LoginModel extends Mysql {
    private $intIdUsuario;
    private $strUsuario;
    private $strPassword;

    public function __construct(){
        parent::__construct();
    }

    public function loginUser(string $usuario, string $password)
    {
		$this->strUsuario = $usuario;
		$this->strPassword = $password;
		$sql = "SELECT idpersona,status FROM z_persona WHERE 
				email_user = '$this->strUsuario' and 
				password = '$this->strPassword' and 
				status != 0 ";
		$request = $this->select($sql);
		return $request;
    }

    public function sessionLogin(int $idUser){
        $this->intIdUsuario = $idUser;

        // Buscar Rol
        $sql = "SELECT  p.idpersona,
                        p.identificacion,
						p.nombres,
						p.apellidos,
						p.telefono,
						p.email_user,
						p.nit,
						p.nombrefiscal,
						p.direccionfiscal,
						r.idrol,
                        r.nombrerol,
						p.status 
                FROM z_persona p
                INNER JOIN z_rol r
                ON p.rolid = r.idrol
                WHERE p.idpersona = $this->intIdUsuario";
        $request = $this->select($sql);
        $_SESSION['userData'] = $request;
        return $request;
    }
}


?>