<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Seach_Model');
	}

	public function index()
	{
		$this->_data['titlePage']	= 'Search';
		$this->_data['loadPage']	= 'search/index';
		if($this->input->post())
		{
	       	$keyword = $this->input->post('search_user');
	        if(empty($keyword))
	        {
	        	$this->_data['search_results'] = '';
	        	$this->_data['empty_search_results'] = 'No result...';
	        }
	        else
	        {
	        	$this->_data['search_results'] = $this->Seach_Model->search($keyword);
	        	$this->_data['friends_list'] = $this->Seach_Model->get_all_frends_list();
	        }
		}
		$this->load->view($this->_data['path'],$this->_data);
	}

	public function add()
	{
		if($this->session->userdata('user_login'))
		{
			$u_id = $_SESSION['user_login']['id'];
			$add_id = $this->input->post('add_id');
			if(isset($add_id) && ($u_id != $add_id) )
			{
				if(!($this->Seach_Model->check_id($u_id, $add_id)))
				{
					$this->Seach_Model->add_user_friend_by_id($u_id, $add_id);
				}
			}
		}
	}

	public function edit()
	{
		if($this->session->userdata('user_login'))
		{
			$u_id = $_SESSION['user_login']['id'];
			$add_id = $this->input->post('add_id');
			if(isset($add_id))
			{
				if($this->Seach_Model->check_id($u_id, $add_id))
				{
					$this->Seach_Model->delete_friend_by_id($u_id, $add_id);
				}
			}
		}		
	}

}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */