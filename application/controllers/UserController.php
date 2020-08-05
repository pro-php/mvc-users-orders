<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

use application\lib\Pagination;


class UserController extends Controller {

	private $error = '';

	public function __construct($route) {
		parent::__construct($route);

		$this->model = $this->loadModel($route['controller']);

		$this->view = new View($route);
		$this->view->layout = $route['controller'];
	}

	private function loginValidate($post) {
		if (empty($post['login']) || empty($post['password'])) {
			$this->error = 'Укажите логин и пароль!';
			return false;
		}

		$id = $this->model->loginExists($post['login'], $post['password']);
		if ($id<=0) {
			$this->error = 'Логин или пароль указан неверно!';
			return false;
		}

		return $id;
	}

	private function userValidate($post, $action='') {
		if (empty($post['login'])) {
			$this->error = 'Укажите логин';
			return false;
		} elseif (empty($post['fio'])) {
			$this->error = 'Укажите ФИО';
			return false;
		}

		if ($action=='reg')
		{			
			if (empty($post['email'])) {
				$this->error = 'Укажите емайл';
				return false;
			} elseif (filter_var($post['email'], FILTER_VALIDATE_EMAIL) === false) {
				$this->error = 'Не верный формат емайла';
				return false;
			} elseif (empty($post['pass'])) {
				$this->error = 'Укажите пароль';
				return false;
			}
		}
		else {
			if ( (!empty($post['pass']) || !empty($post['pass2']))
			&&  ($post['pass']!=$post['pass2']) ) {
				$this->error = 'Не верно указан пароль!';
				return false;
			}
		}

		return true;
	}

	private function userIsLogin() {	
		if (!isset($this->request->session['id'])) {
			$this->view->redirect('user/login');
		}
	}

	public function loginAction() {		
		if (isset($this->request->session['id'])) {
			$this->view->redirect('user/edit');
		}

		if (!empty($this->request->post)) {
			$id = $this->loginValidate($this->request->post);
			if (empty($id)) {
				$this->view->message('error', $this->error);
			}
			$this->request->session['id'] = $id;
			$this->view->message('success', 'Успешный вход в систему!', 'user/edit');
		}
		$this->view->render('Вход');
	}

	public function logoutAction() {
		unset($this->request->session['id']);
		$this->view->redirect('');
	}	

	public function registrationAction() {
		if (!empty($this->request->post)) {
			if (!$this->userValidate($this->request->post, 'reg')) {
				$this->view->message('error', $this->error);
			}
			if ($this->model->loginExists($this->request->post['login']))
			{
				$this->view->message('error', 'Логин уже зарегистрирован!');
			}

			$id = $this->model->userRegistration($this->request->post);
			if (!$id) {
				$this->view->message('error', 'Ошибка регистрации пользотваля!');
			}
			$this->view->message('success', 'Пользователь зарегистрирован!');
		}
		$this->view->render('Регистрация пользователя');
	}

	public function editAction() {
		$this->userIsLogin();

		if (!empty($this->request->post)) {
			if (!$this->userValidate($this->request->post)) {
				$this->view->message('error', $this->error);
			}

			$this->model->userEdit($this->request->post, $this->request->session['id']);
			$this->view->message('success', 'Сохранено '.$this->request->session['id'], 'user/edit');
		}
		$vars = [
			'data' => $this->model->userData($this->request->session['id']),
		];

		$this->view->render('Профиль пользователя', $vars);
	}

	public function listAction() {
		$sort = 'id'; $order = 'DESC';
		if (isset($this->route['sort'])) {
			$sort = $this->route['sort'];

			$order_type = 'ASC';
			$pos = stripos($sort, $order_type);
			if ($pos !== false) {	
				$sort = preg_replace("/$order_type/i", '', $sort);
				$order = $order_type;
			}

			$sort_type = ['fio', 'login', 'email'];
			if (!in_array($sort, $sort_type))
			{
				$sort = 'id'; $order = 'DESC';
			}
		}
		$pagination = new Pagination($this->route, $this->model->usersCountGroup('users','email'));
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->usersList($this->route, $pagination->getMax(), $sort, $order),
		];
		$this->view->render('Пользователи с одинаковым емайлом больше одного', $vars);
	}
	
	public function ordersAction() {
		$this->userIsLogin();

		if (!empty($this->request->post)) {			
			if (empty($this->request->post['price']) || !is_numeric($this->request->post['price'])) {
				$this->view->message('error', 'Укажите цену заказа!');
			}

			$order = $this->loadModel('order');
			$id = $order->addOrder($this->request->session['id'], $this->request->post['price']);
			if ($id<=0) {
				$this->view->message('error', 'Не могу добавить заказ!');
			}
		
			$this->view->message('success', 'Заказ добавлен!', 'user/orders');
		}

		$this->view->render('Добавить заказ');
	}	
}