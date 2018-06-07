<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Profile_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_user_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('users_list');
		$data_result  = $query->row();

		return $data_result;
	}

}

/* End of file My_Profile_Model.php */
/* Location: ./application/models/My_Profile_Model.php */