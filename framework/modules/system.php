<?php
class system{

    private $templates = array();

    static function autoload($className){
        require_once $_SERVER['DOCUMENT_ROOT'].'/framework/modules/'.$className.'.php';
    }

    function loadTemplate($template){
        $this->templates[] = $template;
    }

    function buildPage($data = array(), $admin = false){
        if(!$admin){
            include_once 'template/pages/header.php';
            foreach($this->templates as $template){
                include_once 'template/pages/'.$template.'.php';
            }
            include_once 'template/pages/footer.php';
        }else{
            include_once 'template/pages/admin/header.php';
            foreach($this->templates as $template){
                include_once 'template/pages/admin/'.$template.'.php';
            }
            include_once 'template/pages/admin/footer.php';
        }
    }

    function writeLog(){

    }

}