<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('UserData');
	}

    function index()
    {
         $data = array(
            'header' => $this->load->view('templates/header', array(), TRUE),
            'hero' => $this->load->view('templates/hero', array(), TRUE),
            'navtabs' => $this->load->view('templates/nav-tabs', array(), TRUE),
            'sidebar' => $this->userdata->get_view_for_user(array(
				'logged_in' => array(	
					'view' => 'templates/sidebar-logged-in', 
					'data' => array()),
				'default' => array(	
					'view' => 'templates/sidebar', 
					'data' => array()))),
            'footer' => $this->load->view('templates/footer', array(), TRUE),
            'content' => $this->userdata->get_view_for_usertype(array(
				'default' => array(	
					'view' => 'index', 
					'data' => array()),
				'Client' => array(
					'view' => 'client/index', 
					'data' => array('username' => $this->tank_auth->get_username())),
				'Service Provider' => array(
					'view' => 'serviceProvider/index', 
					'data' => array('username' => $this->tank_auth->get_username())),
				'Admin' => array(
					'view' => 'admin/index', 
					'data' => array('username' => $this->tank_auth->get_username()))))
        );

	    $this->load->view('templates/main', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
