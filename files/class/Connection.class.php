<?php

class Connection extends PDO{
    private $dsn = 'mysql:host=127.0.0.1;dbname=tempo';
    private $user = 'root';
    private $password = '';
    public $handle = null;
    private $options = array (
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    );
    
    function __construct(){

        try{
            if($this->handle == NULL){

                $dbh = parent::__construct( $this->dsn, $this->user, $this->password, $this->options );
                $this->handle = $dbh;
                return $this->handle;

            }
        }
        catch( PODException $e){

            echo "Connection faill. Error" . $e->getMessage();

        }

    }
    function __destruct(){

        $this->handle = NULL;

    }


}