<?php

return [
	//default action
	'' => [
		'controller' => 'main',
		'action' => 'orders',
	],
	
	//user login
	'user/login' => [
		'controller' => 'user',
		'action' => 'login',
	],
	'user/registration' => [
		'controller' => 'user',
		'action' => 'registration',
	],

	//user action
	'user/edit' => [
		'controller' => 'user',
		'action' => 'edit',
	],
	'user/orders' => [
		'controller' => 'user',
		'action' => 'orders',
	],	
	'user/logout' => [
		'controller' => 'user',
		'action' => 'logout',
	],	

	//users list
	'user/list' => [
		'controller' => 'user',
		'action' => 'list',
	],
	'user/list/{page:\d+}' => [
		'controller' => 'user',
		'action' => 'list',
	],
];