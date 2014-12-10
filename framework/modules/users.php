<?php

class users extends db{

    function login($array){
        if($array['login'] == ''){
            return 'noLogin';
        }elseif(strlen($array['login']) < 4){
            return 'badLogin';
        }elseif(filter_var($array['login'], FILTER_VALIDATE_EMAIL)){
            return 'loginIsEmail';
        }

        if($array['password'] == ''){
            return 'noPassword';
        }elseif(strlen($array['password']) < 4){
            return 'badPassword';
        }

        $query = $this->query("SELECT `id`, `password` FROM `users` WHERE `login` = '{$array['login']}' AND `confirmed` = '1'");
        if($query->num_rows < 1){
            return 'noUsers';
        }

        $query = $query->fetch_assoc();
        if($query['password'] == hash("sha512", $array['password'], false)){
            $_SESSION['userID'] = $query['id'];
            return 'success';
        }else{
            return 'failure';
        }

    }

	function loginExists($login){
		$query = $this->query("SELECT `id` FROM `users` WHERE `login` = '{$login}'");
		return $query->num_rows >= 1;
	}

    function exists($id){
        $query = $this->query("SELECT `id` FROM `users` WHERE `id` = '{$id}' AND `confirmed` = '1'");
        return $query->num_rows >= 1;
    }

	function activate($code){
		$query = $this->query("SELECT `email` FROM `activations` WHERE `code` = '{$code}'");

		if($query->num_rows < 1){
			return false;
		}

		$query = $query->fetch_assoc();
		$this->query("UPDATE `users` SET `confirmed` = '1' WHERE `email` = '{$query['email']}'");
		$this->query("DELETE FROM `activations` WHERE `code` = '{$code}'");
		return true;
	}

    function register($array){
        if($array['password'] == ''){
            return 'noPassword';
        }elseif(strlen($array['password']) < 4){
            return 'badPassword';
        }

        if($array['login'] == ''){
            return 'noLogin';
        }elseif(strlen($array['login']) < 4){
            return 'badLogin';
        }elseif(filter_var($array['login'], FILTER_VALIDATE_EMAIL)){
            return 'loginIsEmail';
        }

        if($array['email'] == ''){
            return 'noEmail';
        }elseif(!filter_var($array['email'], FILTER_VALIDATE_EMAIL)){
            return 'badEmail';
        }

        $query = $this->query("SELECT `login`, `email` FROM `users` WHERE `login` = '{$array['login']}' OR `email` = '{$array['email']}'");
        if($query->num_rows >= 1){
            return 'userExists';
        }

		$f = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfeqv4SAAAAAFLZPlKz177kdZhPl24RyYg_8w4_&response=".$array['g-recaptcha-response']);
		$f = json_decode($f);
		$f = (array) $f;
		$f = $f['success'];

		if($f != 1){
			return 'wrongCaptcha';
		}

        $password = hash("sha512", $array['password'], false);
        $array['phoneCode'] = $array['phoneCode'] == '' ? '+38' : $array['phoneCode'];
        $array['phone'] = $array['phone'] != '' ? $array['phoneCode'].(filter_var($array['phone'], FILTER_SANITIZE_NUMBER_INT)) : '';
        $this->query("INSERT INTO `users` (`login`, `password`, `email`, `name`, `surname`, `phone`) VALUES ('{$array['login']}', '{$password}', '{$array['email']}', '{$array['name']}', '{$array['surname']}', '{$array['phone']}')");

		$activationLink = md5($password.$array['email']);
		$this->query("INSERT INTO `activations` (`code`, `email`) VALUES ('{$activationLink}', '{$array['email']}')");

		/*
		$m = new emails();
		$query = $this->query("SELECT `value` FROM `messages` WHERE `type` = '1' AND `messageType` = '1'");
		$query->fetch_assoc();
		$m->send($array['email'], $query['value']);
		*/

		return 'success';
    }

}