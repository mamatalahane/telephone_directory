<?php
class Contact_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = "contact";
	}

	public function insertContact($data)
	{
		if($this->db->insert($this->table, $data))
		{	
			return  $this->db->insert_id();
		}
		else
		{	
			//echo $this->db->last_query(); exit;
			return false;
		}
	} 


	public function updateContact($insert_data, $update_id) {

		$this->db->where('id', $update_id);
    	$this->db->update($this->table, $insert_data);
    	//echo $this->db->last_query(); exit;

	}


	public function getcontact($id='') {
		$this->db->select('*, CONCAT(fname," ",mname," ",lname) as name');
		$this->db->from($this->table);
		if(!empty($id)) {
		$this->db->where('id', $id);
		}
		$query = $this->db->get();
        return $query->result();
	}


	public function updateViews($id) {

		$this->db->query("UPDATE ".$this->table." SET view = view + 1 WHERE id =".$id);

	}


	public function graph_data() {
		$this->db->select('*, CONCAT(fname," ",mname," ",lname) as name');
		$this->db->from($this->table);
		$query = $this->db->get();
        return $query->result();
	}


	  


}

