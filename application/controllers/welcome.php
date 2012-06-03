<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['usertype']	= $this->tank_auth->get_usertype();
			
			if ($data['usertype'] == "SP")
				redirect('/serviceProvider/index/');
			else if ($data['usertype'] == "C")
				redirect('/client/index/');
			else if ($data['usertype'] == "A")
				redirect('/admin/index/');
			else
				$this->load->view('welcome', $data);
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */