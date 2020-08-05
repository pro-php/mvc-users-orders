<?php

namespace application\models;

use application\core\Model;


class Order extends Model {

	public function addOrder($user_id, $price) {
		$date = time();
		$params = [
			'id' => '',			
			'user_id' => $user_id,
			'price' => $price,
			'date' => $date,			
		];
		$this->db->query('INSERT INTO orders VALUES (:id, :user_id, :price, :date)', $params);
		return $this->db->lastInsertId();
	}

	public function listOrders1() {        
        $row = $this->db->row('
        SELECT 
        u.id, u.fio, u.login, COUNT(*) as total_orders
       FROM
        users u
        JOIN orders o ON u.id = o.user_id
       GROUP BY
        u.id, u.login
       HAVING COUNT(*) > 2
       ');

		return $row;
	}

	public function listOrders2() {        
        $row = $this->db->row('
        SELECT 
        u.id, u.fio, u.login
       FROM
        users u
        LEFT OUTER JOIN orders o ON u.id = o.user_id
        WHERE o.user_id is NULL
       ');

		return $row;
	} 

}