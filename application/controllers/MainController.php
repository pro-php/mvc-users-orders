<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;


class MainController extends Controller {

	public function __construct($route) {
		parent::__construct($route);

		$this->model = $this->loadModel('order');

		$this->view = new View($route);
		$this->view->layout = $route['controller'];
	}

	public function ordersAction() {			
		$orders1 = $this->model->listOrders1();
		$orders2 = $this->model->listOrders2();

		$vars = [
			'orders1' => $orders1,
			'orders2' => $orders2,
		];

		$this->view->render('Заказы',  $vars);
	}
	
}