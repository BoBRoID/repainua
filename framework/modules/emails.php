<?php
class emails{

	private $privateKey = 'c52dabe7a0cc2409da610a0ccc9b5643';
	private $publicKey = '059f336efa88628fb85e28f426740040';

	function sendRequest($params){
		$summ = $this->getControlSumm($params);
		$a = file_get_contents("https://atompark.com/api/email/3.0/".$params['action']."?key=".$this->publicKey."&sum=".$summ.$args);
		return $a;
	}

	function getControlSumm($params){
		$params['version'] = '3.0';
		$params['key'] = $this->publicKey;
		ksort($params);
		$sum = '';
		foreach($params as $key => $value){
			$sum .= $value;
		}
		$sum .= $this->privateKey;
		return md5($sum);
	}

	function getUserBalance(){
		return $this->sendRequest(array('action' => 'getUserBalance'));
	}

}