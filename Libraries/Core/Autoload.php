<?php
    spl_autoload_register(function($class){
        // echo LIBS.'cORE/'.$class.".php";
        // Libraries/Core/home.php
        if(file_exists("Libraries/".'Core/'.$class.".php"))
        {
            require_once("Libraries/".'Core/'.$class.".php");
        }
    });
?>