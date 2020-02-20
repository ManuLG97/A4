<?php


namespace Rentit;


class DB extends \PDO{
    static $instance;
    protected $config;
    public function __construct(){
        $config=$this->loadConf();
        //determines the correct environment in DB
        $strdbconf='dbconf_'.$this->env();
        $dbconf=(array)$config->$strdbconf;
        $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
        $usr=$dbconf['dbuser'];
        $pwd=$dbconf['dbpass'];
        parent::__construct($dsn,$usr,$pwd);
    }
    static function singleton(){
        if(!(self::$instance instanceof self)){
            self::$instance=new self();
        }
        return self::$instance;
    }
    protected function loadConf(){
        $file= 'config.json';
        $jsonStr=file_get_contents($file);
        $arrayJson=json_decode($jsonStr);
        return $arrayJson;
    }
    protected function env(){
        $ipAddress = gethostbyname($_SERVER['SERVER_NAME']);
        if ($ipAddress=='127.0.0.1'){
            return 'dev';
        }else{
            return 'pro';
        }
    }
}