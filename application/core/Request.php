<?php

namespace application\core;


class Request {

	public $get = array();
	public $post = array();
	public $request = array();
	public $cookie = array();
	public $files = array();
	public $server = array();
	public $session = array();

	public function __construct() {
	    $_GET 		= $this->clean($_GET);
		$_POST 		= $this->clean($_POST);
		$_REQUEST 	= $this->clean($_REQUEST);
		$_COOKIE 	= $this->clean($_COOKIE);
		$_FILES 	= $this->clean($_FILES);
		$_SERVER 	= $this->clean($_SERVER);

		$this->get 	= &$_GET;
		$this->post 	= &$_POST;
		$this->request 	= &$_REQUEST;
		$this->cookie 	= &$_COOKIE;
		$this->files 	= &$_FILES;
		$this->server 	= &$_SERVER;
		$this->session 	= &$_SESSION;
	}

  	private function clean($data) {
		if (is_array($data)) {
	  		foreach ($data as $key => $value) {
				unset($data[$key]);
				$data[$this->clean($key)] = $this->clean($value);
	  		}
		} else {
			$data = urldecode($data);
			$data = iconv(mb_detect_encoding($data, mb_detect_order(), true), "UTF-8//IGNORE", $data);
	  		$data = trim($data);
	  		$data = htmlspecialchars($data, ENT_COMPAT);
		}
		return $data;
	}
}
?>