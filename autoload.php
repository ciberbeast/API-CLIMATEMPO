<?php
function autoload($class){
    
    $dirs = array (
        "class"
    );

    foreach( $dirs as $dir ){

        if(file_exists(__DIR__."/files/".$dir."/".$class.".class.php")){
            
            include __DIR__."/files/".$dir."/".$class.".class.php";

        }

    }

}
spl_autoload_register('autoload');