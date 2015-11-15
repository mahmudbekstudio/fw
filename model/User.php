<?php
namespace application\model;

use application\lib\Model;

class User extends Model {

	public $table = 'user';

	public function getList() {
		return $this->get();
	}

}