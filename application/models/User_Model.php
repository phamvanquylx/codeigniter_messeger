<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all_user()
	{
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('users_list');
		$data_result = $query->result();

		return $data_result;
	}

}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */