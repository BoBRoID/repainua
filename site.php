<?php

    error_reporting(0);

    include 'framework/modules/system.php';

    function __autoload($className){
        system::autoload($className);
    }

	$router = new router();
	if($_POST['ajax_do'] || $_GET['ajax'] == 'true'){
		$m = new claims();
		$m->ajax($_POST ? $_POST : $_GET);
	}elseif($_POST){
		$m = new claims();
		$m->fetch($_POST);
		$router->go();
	}else{
		$router->go();
	}

