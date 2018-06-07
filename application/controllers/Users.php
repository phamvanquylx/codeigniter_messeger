<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
	}

	public function index()
	{
		$this->_data['titlePage']	= 'Users';
		$this->_data['loadPage']	= 'users/index';
		$this->_data['data_result'] = $this->User_Model->get_all_user();
		$this->load->view($this->_data['path'],$this->_data);
	}

	public function add()
	{
		$this->_data['titlePage']	= 'Users';
		$this->_data['loadPage']	= 'users/add';
		$this->load->view($this->_data['path'],$this->_data);

	}

	public function edit()
	{
		$this->_data['titlePage']	= 'Users';
		$this->_data['loadPage']	= 'users/edit';
		$this->load->view($this->_data['path'],$this->_data);

	}

	public function delete()
	{
		$this->_data['titlePage']	= 'Users';
		$this->_data['loadPage']	= 'users/index';
		$this->load->view($this->_data['path'],$this->_data);

	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */