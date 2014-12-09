<?php
class pages extends db{

	function get($link, $type = 'page'){
		$query = $this->query("SELECT * FROM `pages` WHERE `link` = '{$link}' AND `pageType` = '{$type}'");

		if($query->num_rows < 1){
			return false;
		}

		$query = $query->fetch_assoc();
		return $query;
	}

}