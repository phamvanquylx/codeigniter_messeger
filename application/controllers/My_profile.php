<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_profile extends MY_controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('My_Profile_Model');
	}

	public function index()
	{
		$this->_data['titlePage']	= 'My Profile';
		$this->_data['loadPage']	= 'profile/index';

		if($this->input->post())
		{	
			if(is_uploaded_file($_FILES['profile_images']['tmp_name'])) {

				$config['upload_path']   = './api/avatars/users/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite']     = TRUE;
				$config['max_size']      = '2024';
				$config['file_name']     = strtotime('now');
				$config["width"] 		 = 100;
				$config["height"] 		 = 100;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('profile_images'))
				{
					$img = array('upload_data' => $this->upload->data());
					$images	= 'images/user/'.$img['upload_data']['file_name'];
				}
				else
				{
					$this->_data['error'] = $this->upload->display_errors();
				}
			}

			if($this->input->post('user_password') != '')
			{
				$this->form_validation->set_rules('user_account', 'User Name', 'trim|required|min_length[5]|max_length[25]');
				$this->form_validation->set_rules('user_password', 'User Password', 'required|min_length[5]|max_length[25]');
				if($this->form_validation->run() == TRUE)
				{
					$data = array(
						'name' 		=> $this->input->post('user_account'),
						'password' 	=> $this->input->post('user_password'),
						'avata' 	=> $images
					);
				}
			}
			else
			{
				$this->form_validation->set_rules('user_account', 'User Name', 'trim|required|min_length[5]|max_length[25]');
				if($this->form_validation->run() == TRUE)
				{
					$data = array(
						'name' 		=> $this->input->post('user_account'),
					);
				}
			}
		}

		$this->load->view($this->_data['path'],$this->_data);
	}

}

/* End of file My_profile.php */
/* Location: ./application/controllers/My_profile.php */