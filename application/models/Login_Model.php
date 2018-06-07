<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function check_account($account)
	{
		$this->db->where('account', $account);
		$result = $this->db->count_all_results('users_list');

		return $result;
	}

	public function check_status($account)
	{
		$this->db->select('status');
		$this->db->where('account', $account);
		$query = $this->db->get('users_list');
		$data_result = $query->row()->status;

		return $data_result;
	}

	public function check_password($account)
	{
		$this->db->select('password');
		$this->db->where('account', $account);
        $query = $this->db->get('users_list');
        $data_result = $query->row();

        return $data_result;
	}

	public function get_id_by_account($account){
		$this->db->select('id');
		$this->db->where('account', $account);
        $query = $this->db->get('users_list');
        $data_result = $query->row();

        return $data_result;
	}

}

/* End of file Login_Model.php */
/* Location: ./application/models/Login_Model.php */