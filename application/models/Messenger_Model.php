<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messenger_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_user_by_id($id)
	{
		$this->db->select('id,name,account,avata');
		$this->db->where('id', $id);
		$query = $this->db->get('users_list');
		$data_result = $query->row();

		return $data_result;
	}	

	public function add_messenger_by_id($data)
	{
		if($data)
		{
			$this->db->insert('users_messeger', $data);
		}
	}

	public function update_messenger_by_id($id_mess, $data_update)
	{
		if($id_mess)
		{
			$this->db->where('id', $id_mess);
			$this->db->update('users_messeger', $data_update);
		}
	}

	public function get_messenger_by_id($id_mess)
	{
		if($id_mess)
		{
			$this->db->select('*');
			$this->db->where('id', $id_mess);
			$query = $this->db->get('users_messeger');
			$data_result = $query->row();

			return $data_result;
		}
	}

	public function get_all_messenger()
	{
		$this->db->select('id, i_id, y_id');
		$query = $this->db->get('users_messeger');
		$data_result = $query->result();

		return $data_result;		
	}

}

/* End of file Messenger_Model.php */
/* Location: ./application/models/Messenger_Model.php */