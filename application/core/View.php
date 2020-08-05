<?php

namespace application\core;

class View {

	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function render($title, $vars = []) {
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layouts/'.$this->layout.'.php';
		}
	}

	public function redirect($url) {
		header('Location: /'.$url);
		exit;
	}

	public static function redirect301($path) { 
		$protocol = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
		$host = $_SERVER['SERVER_NAME'];
		$url = "$protocol://$host/$path/";

		http_response_code(301);
		header("Location: $url");
		exit();
	}

	public static function errorCode($code,$path='') {
		if ($code==301 && !empty($path))
			self::redirect301($path);
		else {
			http_response_code($code);
			$path = 'application/views/errors/'.$code.'.php';
			if (file_exists($path)) {
				require $path;
			}
			exit;
		}
	}

	public function message($status, $message, $url='') {
		exit(json_encode(['status' => $status, 'message' => $message, 'url' => $url]));
	}

	public function location($url) {
		exit(json_encode(['url' => $url]));
	}
 
}	