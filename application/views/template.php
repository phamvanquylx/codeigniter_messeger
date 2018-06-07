<?php

if($this->uri->segment(1) == 'login' || $this->uri->segment(1) == 'Login')
{
	if($this->session->userdata('user_login'))
	{
		redirect(base_url('dashboard'));
	}
	else
	{
		$this->load->view($loadPage);
	}
}
else
{
	if($this->session->userdata('user_login'))
	{
		$this->load->view("header");
		$this->load->view("sidebar");
		$this->load->view($loadPage);
		$this->load->view("footer");
	}
	else
	{
		header("Location: ".base_url()."login");
	}
}


?>