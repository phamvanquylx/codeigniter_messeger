<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	protected $_data;
	
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('user_login')){
			$id = $_SESSION['user_login']['id'];
            $this->db->select('id, name, account, email, avata, status');
            $this->db->where('id', $id);
            $query = $this->db->get('users_list');
            $result = $query->row();			
			$this->_data['admin_login'] = $result;

			// time check out
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$timestamp = time();
			$log_time = array(
				'u_id' => $id,
				'time' => $timestamp
			);

			$this->db->select('u_id, time');
			$query = $this->db->get('users_online');
			$check_u_id = $query->result();

			foreach ($check_u_id as $value) {
				if($value->time < ($timestamp - 600))
				{
					$this->db->where('u_id', $value->u_id);
					$this->db->delete('users_online');
				}
			}

			/* insert - update user login online */
			$this->db->where('id', $id);
			$this->db->update('users_list', array('timelogin' => $timestamp));

			$this->db->select('u_id, time');
			$this->db->where('u_id', $id);
			$query = $this->db->get('users_online');
			$count_u_id = $query->row();
			if(count($count_u_id->u_id) > 0)
			{
				$this->db->where('u_id', $count_u_id->u_id);
				$this->db->update('users_online', array('time' => $timestamp));
			}
			else
			{
				$this->db->insert('users_online', $log_time);
			}
			/* end */

			/* check user online */
			$this->db->select('*');
			$query_time = $this->db->get('users_online');
			$timestamp = $query_time->result();
			$timeout = [];
			foreach ($timestamp as $value) {
				$timeout[] = $value->u_id;
			}
			$this->_data['results'] = [];
			foreach ($timeout as $value) {
				$this->db->select('id, name');
				$this->db->where('id', $value);
				$query = $this->db->get('users_list');
				$this->_data['results'][] = $query->row();
			}
			// $this->db->select('u_id, time');
			// $this->db->where('u_id', $id);
			// $query = $this->db->get('users_online');
			// $count_u_id = $query->row();

   //          $this->db->select('id, name, account,avata');
   //          $this->db->where('id', $id);
   //          $query_off = $this->db->get('users_list');
			// $data_off = $query_off->result();
			// $this->_data['off_results'] = $data_off;
		}
		
		$this->_data['path'] = 'template';
	}

}

/* End of file MY_controller.php */
/* Location: ./application/controllers/MY_controller.php */