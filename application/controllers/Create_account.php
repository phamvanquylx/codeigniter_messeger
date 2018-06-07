<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_account extends MY_controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Create_account_Model');
	}

	public function index()
	{
		$this->_data['titlePage']	= 'Create Account';
		$this->_data['loadPage']	= 'create/index';

		if($this->input->post())
		{
			// check user registered
			$this->form_validation->set_rules("user_account", "User Account", "trim|required|min_length[5]|max_length[25]|is_unique[users_list.account]");
			$this->form_validation->set_rules('user_password', 'User Password', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_message('is_unique', "The account address has already been registered.");
			if($this->form_validation->run() == true)
			{
				$data = array(
					'account' 		=> $this->input->post('user_account'),
					'password' 		=> password_hash($this->input->post("user_password"), PASSWORD_DEFAULT),
					'status' 		=> $this->input->post('status_user'),
					'create_time' 	=> date('Y-m-d H:i:s')
				);		
				$this->Create_account_Model->add($data);
				$this->session->set_flashdata('msg', 'Create Account Success.');
			}
		}

		$this->load->view($this->_data['path'],$this->_data);		
	}
}

/* End of file Create_account.php */
/* Location: ./application/controllers/Creat_account.php */