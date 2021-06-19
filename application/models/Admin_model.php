<?php
class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = "users";
	}

	public function checkDuplicate($email)
	{
		$this->db->select('email');
		$this->db->from($this->table);
		$this->db->like('email', $email);
		return $this->db->count_all_results();
	}

	public function insertUser($data)
	{
		if($this->db->insert($this->table, $data))
		{
			return  $this->db->insert_id();
		}
		else
		{
			return false;
		}
	} 

	public function get_all_details($id){
        $this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
        return $query->result();
	}

	function login_check($login, $password)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('email', $login);
        $this->db->where('password', md5($password));
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
		   return true;
		}else{
		   return false;
		}
	}

	private function getConn($conn) {
		if(!is_bool($conn)) {
			return $conn;
		} else {
			return $this->db;
		}
	}

	public function getByField($table, $fieldName, $value, $conn = false) {
		$conn = $this->getConn($conn);
		$conn->where($fieldName, $value);
		$query = $conn->get($table);
		$result = $query->result_array();
		if(sizeof($result) > 0) {
			return $result[0];
		} else {
			return array();
		}			
	}

	public function total_users(){
        $this->db->select('count(user_id) as total_users');
		$this->db->from('users');
		$query = $this->db->get();
        return $query->result();
	}

	public function total_contacts(){
        $this->db->select('count(id) as total_contacts');
		$this->db->from('contact');
		$query = $this->db->get();
        return $query->result();
	}

}

