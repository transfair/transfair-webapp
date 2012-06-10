<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('CleanCRMForm');
		$this->load->library('UserData');
	}

    function about()
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
            'content' => $this->load->view('client/about', array(), TRUE)
        );
        $this->load->view('templates/main', $data);
    }

    function register()
    {
        $data = array(
            'header' => $this->load->view('templates/header', array(), TRUE),
            'hero' => $this->load->view('templates/hero', array(), TRUE),
            'navtabs' => $this->load->view('templates/nav-tabs', array(), TRUE),
            'sidebar' => $this->load->view('templates/sidebar', array(), TRUE),
            'footer' => $this->load->view('templates/footer', array(), TRUE),
            'content' => $this->load->view('client/register', array(
                'form' => $this->cleancrmform->cleanCRMForm("ClientRegistration") 
            ), TRUE)
        );
        $this->load->view('templates/main', $data);
    }

	function index()
	{
		redirect('client/about');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
