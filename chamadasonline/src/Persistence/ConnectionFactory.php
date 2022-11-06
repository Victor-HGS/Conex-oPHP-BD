<?php
namespace App\persistence;

class ConnectionFactory{
   
    private $_conn;
    private $_user = "root";
    private $_pass = "admin123";
    private $_bdname = "chamadasonline";
    private $_host = "localhost";

    function __construct()
    {}
    
    public function getInstance(){
        try{
            if(!isset($this->_conn)){
                $this->_conn = new \PDO("mysql:host=localhost;dbname=chamadasonline;charset=UTF8", "root", "admin123");
                return $this->_conn;
            }else{
                return $this->_conn;
            }
            }
            catch(\PDOException $e){
                $e->getMessage();
        }
    }
}