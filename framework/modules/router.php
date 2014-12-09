<?php
class router extends db{

    private $pages = array();
    private $backendPages = array();

    function load($page, $position = array()){
        if(file_exists('template/pages/frontend/'.$page.'.php')){
            if($position['0'] == 'before' || $position['0'] == 'after'){
                $t = array();

                foreach($this->pages as $tPage){
                    if($tPage == $position['1'] && $position['0'] == 'before'){
                        $t = $page;
                    }
                    $t[] = $tPage;
                    if($tPage == $position['1'] && $position['0'] == 'after'){
                        $t = $page;
                    }
                }

                $this->pages = $t;
            }else{
                $this->pages[] = $page;
            }
        }
    }

    function getURL(){
        $link = explode('/', $_SERVER['REQUEST_URI']);
        if($link['1'] == 'home' || $link['1'] == 'index'){
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: http://".$_SERVER['SERVER_NAME']);
            exit();
        }
        if($link['1'] != ''){
            $lastIndex = (sizeof($link) - 1);
            if(preg_match('/.html|.php/', $link[$lastIndex])){
                $t = explode('?', $_SERVER['REQUEST_URI']);
                $t['0'] = $link[$lastIndex] = preg_replace('/.html|.php/', '', $t['0']);
                $location = $_SERVER['SERVER_NAME'].$t['0'];
                $location .= $t['1'] != '' ? '?'.$t['1'] : '';
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: http://".$location);
                exit();
            }
            if($link['1'] == 'index' || $link['1'] == ''){
                $link['1'] = 'home';
            }
        }else{
            $link['1'] = 'home';
        }
        $link = preg_replace('/(\?.*)/', '', $link);
        return $link;
    }

	function existsPage($page){
		$lastIndex = (sizeof($page) - 1);
        $servicePages = array(
            'home', 'cabinet', 'map', 'list', 'registration', 'rescue'
        );

		if($page['1'] == 'user' || $page['1'] == 'base'){
            if($page['1'] == 'user'){
                if($_SESSION['userID'] != '' && $page['2'] == ''){
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: http://".$_SERVER['SERVER_NAME'].'/user/'.$_SESSION['userID']);
                    exit();
                }
                $m = new users();
            }else{
                if($page['2'] == ''){
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: http://".$_SERVER['SERVER_NAME'].'/list');
                    exit();
                }
                $m = new bases();
            }
            return $m->exists($page['2']);
        }else{
            if($page[$lastIndex] == '404'){
                return true;
            }

            if(in_array($page['1'], $servicePages)){
                return true;
            }

            $query = $this->query("SELECT `id` FROM `pages` WHERE `link` = '{$page['1']}'");
            if($query->num_rows >= 1){
                return true;
            }
        }

        return false;
	}

    function getCategoryMaintance($catID){
        return false;
    }

    function getTemplateData($link){
        $query = $this->query("SELECT * FROM `pages` WHERE `link` = '{$link}'");
        return $query->fetch_assoc();
    }

	function go(){
		$link = $this->getURL();
        $data = array();

        $this->load('service/menu');

		if($this->existsPage($link) == false){
			header("HTTP/1.0 404 Not Found");
            $this->load('404');
		}else{
            switch($link['1']){
                case 'user':
                    $this->load('cabinet/userpage');
                    break;
                case 'base':
                    $this->load('base');
                    break;
                case 'map':
                    $this->load('map');
                    break;
                case 'list':
					$title = "Список репетиционных баз - repa.in.ua";
                    $this->load('list');
                    break;
                case 'registration':
					$title = "Регистрация - repa.in.ua";
                    $this->load('cabinet/registration');
                    break;
                case 'rescue':
					$title = "Восстановление пароля - repa.in.ua";
                    $this->load('cabinet/rescue');
                    break;
                case 'cabinet':
                    if($_SESSION['userID'] != ''){
                        $m = new users();
                        switch($link['2']){
                            case 'edit':
                                $this->load('cabinet/edit');
                                break;
                            case 'user':
                                $this->load('cabinet/main');
                                break;
                            default:
                                header("Location: http://".$_SERVER['SERVER_NAME'].'/cabinet/user');
                                exit();
                                break;
                        }
                    }else{
                        header("Location: http://".$_SERVER['SERVER_NAME'].'/#notLogged');
                        exit();
                    }
                    break;
                case 'home':
					$title = "repa.in.ua - каталог репетиционных баз Киева и Украины";
                    $this->load('home');
                    break;
                default:
                    $tData = $this->getTemplateData($link['1']);
                    if($tData['pagetype'] == 'page' && $this->getCategoryMaintance($tData['mainCategory'])){
                        $tData['maintance'] = '1';
                        $tData['pagetype'] = 'category';
                    }

                    if($tData['maintance'] == '1'){
                        $this->load('maintance/'.$tData['pagetype']);
                        break;
                    }

                    $this->load('pagetemplates/'.$tData['pagetype']);
                    break;
            }
        }

		$data['document'] = array(
			'title' 		=> 	$title,
			'description' 	=> 	$description,
			'keywords'		=>	$keywords
		);

        $this->buildPage($data, $link);
	}

	function buildPage($data, $link){
		$document = $data['document'];
        include 'template/pages/frontend/service/header.php';
        if(sizeof($this->pages) >= 1){
            foreach($this->pages as $a){
                include 'template/pages/frontend/'.$a.'.php';
            }
        }
        include 'template/pages/frontend/service/footer.php';
	}

}