<?php

    error_reporting(0);

    include 'framework/modules/system.php';

    function __autoload($className){
        system::autoload($className);
    }

	$router = new router();
	$router->go();
