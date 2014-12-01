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

    function exists($id){
        $query = $this->query("SELECT `id` FROM `users` WHERE `id` = '{$id}' AND `confirmed` = '1'");
        return $query->num_rows >= 1;
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

        $password = hash("sha512", $array['password'], false);
        $array['phoneCode'] = $array['phoneCode'] == '' ? '+380' : $array['phoneCode'];
        $array['phone'] = $array['phoneCode'].(filter_var($array['phone'], FILTER_SANITIZE_NUMBER_INT));
        $this->query("INSERT INTO `users` (`login`, `password`, `email`, `name`, `surname`, `phone`) VALUES ('{$array['login']}', '{$password}', '{$array['email']}', '{$array['name']}', '{$array['surname']}', '{$array['phone']}')");
        return 'success';
    }

}