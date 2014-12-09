<?php

    error_reporting(0);

    include 'framework/modules/system.php';

    function __autoload($className){
        system::autoload($className);
    }

	$router = new router();
	if($_POST['ajax'] || $_GET['ajax']){
		$m = new claims();
		$m->ajax($_POST ? $_POST : $_GET);
		exit;
	}elseif($_POST){
		$m = new claims();
		$m->fetch($_POST);
		$router->go();
	}else{
		$router->go();
	}

