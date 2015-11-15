<?php
namespace application\lib;

class Model extends Instance {
	public $table = '';
	public $db;
	private $idName = 'id';

	public function __construct() {
		$this->db = Application::get('db');
	}

	public function get($fields = '*', $params = array()) {
		extract($params);
		return $this->db->get($this->table, null, $fields);
	}

	public function create($fields) {
		$id = $this->db->insert ($this->table, $fields);

		if(!$id) {
			$id = $this->db->getLastError();
		}

		return $id;
	}

	public function update($fields, $where) {
		foreach($where as $key => $val) {
			$this->db->where($key, $val);
		}

		if($this->db->update($this->table, $fields)) {
			return $this->db->count;
		} else {
			return $this->db->getLastError();
		}
	}

	public function delete($where) {
		foreach($where as $key => $val) {
			$this->db->where($key, $val);
		}

		if($this->db->delete($this->table)) {
			return true;
		} else {
			return $this->db->getLastError();
		}
	}

	public function getId() {
		return $this->idName;
	}

	public function setId($idName) {
		$this->idName = $idName;
	}
}