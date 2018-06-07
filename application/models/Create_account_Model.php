<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_account_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($data)
	{
		if($data)
		{
			
			return $this->db->insert('users_list', $data);
		}

		return false;
	}

}

/* End of file Create_account_Model.php */
/* Location: ./application/models/Create_account_Model.php */