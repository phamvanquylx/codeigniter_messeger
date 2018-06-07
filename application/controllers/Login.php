<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('Login_Model');
        $this->load->library('encryption');
        $this->load->helper('cookie');		
	}

	public function index()
	{
		$this->_data['titlePage']	= 'Login';
		$this->_data['loadPage']	= 'login/index';

		if($this->input->post())
		{
			$this->form_validation->set_rules('account', 'Account', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');
			if ($this->form_validation->run() == TRUE) {
				$account = $this->input->post('account');
				if($this->Login_Model->check_account($account) > 0)
				{
					if($this->Login_Model->check_status($account) > 0)
					{
						$show_password = $this->Login_Model->check_password($account);

						if(password_verify($this->input->post("password"), $show_password->password))
						{
							if($this->input->post("remember") == 1) :	
								set_cookie('remember',$user,180*24*60*60); //đơn vị thời gian lưu mật khẩu trong 6 tháng
							endif;

							$datasession = array(
								'id'    	=> $this->Login_Model->get_id_by_account($account)->id,
								'account' 	=> $this->input->post("account"),
							);

							$this->session->set_userdata('user_login',$datasession);

							set_message('success', 'Login successfully!');
							
							redirect(base_url('dashboard'));
						}
						else
						{
							$this->session->set_flashdata('login-error','Invalid password');
						}
					}
					else
					{
						$this->session->set_flashdata('login-error','Account not Active');

						redirect(base_url('login'));
					}
				}
				else
				{
					$this->session->set_flashdata('login-error','Account does not exist');

					redirect(base_url('login'));					
				}
			}
		}	
		$this->load->view($this->_data['path'],$this->_data);
	}

	public function logout()
	{
    	$this->session->unset_userdata('user_login');
        $this->session->sess_destroy();
        delete_cookie('remember');

        redirect(base_url()."login");		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */