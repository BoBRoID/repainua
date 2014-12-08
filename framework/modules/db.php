<?php
class db extends mysqli{

    private $dbSettings = array(
        'host'      =>  '127.0.0.1',
        'user'      =>  'root',
        'pass'      =>  '',
        'database'  =>  'repa'
    );

    function connect(){
        $param = $this->dbSettings;
        parent::__construct($param['host'], $param['user'], $param['pass'], $param['database']);
        parent::set_charset("utf8");

        if($this->connect_errno){
            throw new Exception('<meta charset="utf-8">Ошибка: невозможно подключиться к базе данных! Код ошибки: '.$this->connect_errno);
        }
    }

    function __construct(){
        try{
            $this->connect();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

}