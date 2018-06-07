<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_data['titlePage']	= 'Dashboard';
		$this->_data['loadPage']	= 'dashboard/index';
		$this->load->view($this->_data['path'],$this->_data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */