<?php

namespace application\models;

use application\core\Model;


class User extends Model {
	
	public function userRegistration($post) {	
		$pass = sha1($post['pass']);
		$params = [
			'id' => '',			
			'email' => $post['email'],
			'login' => $post['login'],
			'pass' => $pass,
			'fio' => $post['fio'],			
		];
		$this->db->query('INSERT INTO users VALUES (:id, :email, :login, :pass, :fio)', $params);
		return $this->db->lastInsertId();
	}

	public function loginExists($login, $pass='') {
		$params = [
			'login' => $login,
		];

		$addpass='';
		if (!empty($pass))
		{
			$params['pass'] = sha1($pass);
			$addpass = 'AND pass = :pass';
		}

		$row = $this->db->row("SELECT id FROM users WHERE login = :login $addpass", $params);
		if ($row)
			return $row[0]['id'];
		else
			return false;
	}

	public function userEdit($post, $id) {
		$params = [
			'id' => $id,
			'login' => $post['login'],
			'fio' => $post['fio'],
		];

		$addpass = '';
		if (isset($post['pass']) && !empty($post['pass']))
		{
			$params['pass'] = sha1($post['pass']);
			$addpass = ', pass = :pass';
		}

		return $this->db->query("UPDATE users SET login = :login, fio = :fio $addpass WHERE id = :id", $params);
	}

	public function userData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM users WHERE id = :id', $params)[0];
	}

	public function userExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM users WHERE id = :id', $params);
	}

	public function userDelete($id){
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM users WHERE id = :id', $params);
	}

	public function usersCountTotal($where='') {
		return $this->db->column("SELECT COUNT(id) FROM users $where");
	}

	public function usersCountGroup($table, $field) {	
		return $this->db->column("		
		SELECT COUNT(*) FROM
		(
			SELECT $field, COUNT(*)
			FROM $table
			GROUP BY $field HAVING COUNT(*)>1
		) 
		d1");			
	}

	public function usersList($route, $max, $order = 'id', $sort = 'DESC') {
		if (isset($route['page']) && $route['page']>0) {
		    $route['page'] = $route['page']-1;
		} else {
			$route['page'] = 0;
		}

		$params = [
			'max' => $max,
			'start' => ($route['page'] * $max),
		];
		
		return $this->db->row("SELECT id, fio, login, COUNT(*) AS emails FROM users GROUP BY email HAVING COUNT(*)>1 ORDER BY $order $sort LIMIT :start, :max", $params);
	}

}