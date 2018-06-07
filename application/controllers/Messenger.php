<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messenger extends MY_controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Messenger_Model');
	}

	public function index()
	{
		$this->_data['titlePage']	= 'Messenger';
		$this->_data['loadPage']	= 'messenger/index';
		$this->load->view($this->_data['path'],$this->_data);			
	}

	public function view()
	{
		$this->_data['titlePage']	= 'Messenger';
		$this->_data['loadPage']	= 'messenger/view';
		$id 	= $_SESSION['user_login']['id'];
		$y_id 	= decode_value($this->uri->segment(3));
		$id_mess = '';
		$this->_data['userFriend'] = $this->Messenger_Model->get_user_by_id($y_id);
		$id_messenger = $this->Messenger_Model->get_all_messenger();

		if($id_messenger > 0)
		{
			foreach ($id_messenger as $value) {
				if(($value->i_id == $id && $value->y_id == $y_id) || ($value->i_id == $y_id && $value->y_id == $id))
				{
					$id_mess = $value->id;
				}
			}
		}
		$this->_data['messenger'] = $this->Messenger_Model->get_messenger_by_id($id_mess);
		$this->load->view($this->_data['path'],$this->_data);
	}

	public function add()
	{
		$this->session->userdata('user_login');
		$id 		= $_SESSION['user_login']['id'];
		$y_id  		= $this->input->post('id_set');
		$timestamp 	= time();
		$content 	= json_encode(
						array(
							array(
								'i_id' 		=> $id,
								"content"   => $this->input->post('content'),
								"time" 		=> $timestamp
							),
					 	)
					);
		$data = array(
			'i_id' 		=> $id,
			'y_id' 		=> $y_id,
			'content' 	=> $content,
			'time'    	=> $timestamp
		);

		/* Check id messenger */
		$id_messenger = $this->Messenger_Model->get_all_messenger();
		if($id_messenger > 0)
		{
			foreach ($id_messenger as $value) {
				if(($value->i_id == $id && $value->y_id == $y_id) || ($value->i_id == $y_id && $value->y_id == $id))
				{
					$id_mess = $value->id;
				}
			}
		}

		if($id_mess > 0)
		{
			$contents = array(
							'i_id' 		=> $id,
							"content"   => $this->input->post('content'),
							"time" 		=> $timestamp
						);
			$data_messenger = json_decode($this->Messenger_Model->get_messenger_by_id($id_mess)->content, true);
			array_push($data_messenger, $contents);
			$data_update = array(
				'content' 	=> json_encode($data_messenger),
			);
			$this->Messenger_Model->update_messenger_by_id($id_mess, $data_update);
		}
		else
		{
			$this->Messenger_Model->add_messenger_by_id($data);
		}
	}

}

/* End of file Messenger.php */
/* Location: ./application/controllers/Messenger.php */