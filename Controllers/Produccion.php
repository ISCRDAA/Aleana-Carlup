<?php
class Produccion extends Controllers{
    public function __construct()
    {
        
        parent:: __construct();
    }
    public function produccion(){
        $data['page_id'] = 6;
        $data['page_tag'] = "Produccion";
        $data['page_title'] = "Produccion ";
        $data['page_name'] = "Produccion  <samll>Aleana&Carlup </samll>";
        $this -> views -> getView($this,"produccion",$data);
    }
}
?>