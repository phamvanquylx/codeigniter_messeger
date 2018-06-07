<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seach_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

    function search($keyword)
    {
        $this->db->like('account', $keyword);
        $this->db->select('id, name, account, avata');
        $query = $this->db->get('users_list');

        return $query->result();
    }

    public function add_user_friend_by_id($u_id, $add_id)
    {
    	$data = array(
    		'u_id' 		=> $u_id,
    		'add_id' 	=> $add_id
    	);
    	$this->db->insert('users_friend', $data);
    }

    public function check_id($u_id, $add_id)
    {
    	$this->db->select('u_id, add_id');
    	$this->db->where('u_id', $u_id);
    	$this->db->where('add_id', $add_id);
    	$query = $this->db->get('users_friend');
    	$data_result = $query->row();

    	return $data_result;
    }

    public function get_all_frends_list()
    {
        $this->db->select('add_id');
        $query = $this->db->get('users_friend');
        $data_result = $query->result();

        return $data_result;
    }

    public function delete_friend_by_id($u_id, $add_id)
    {
        $this->db->where('u_id', $u_id);
        $this->db->where('add_id', $add_id);
        $this->db->delete('users_friend');
        if($this->db->affected_rows() > 0 )
        {

            return true;
        }
        else
        {

            return false;
        }

    }

}

/* End of file Seach_Model.php */
/* Location: ./application/models/Seach_Model.php */