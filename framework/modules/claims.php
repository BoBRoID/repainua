<?php
class claims{

	function fetch($array){

	}

	function ajax($array){
		switch($array['action']){
			case 'register':
				$m = new users();
				echo $m->register($array);
				break;
			case 'help':
				$m = new pages();
				$m = $m->get('terms-and-licenses');
				echo $m['data'];
				break;
			case 'haveAUser':
				$m = new users();
				echo $m->loginExists($array['login']) ? "true" : "false";
				break;
		}
		exit;
	}

}