<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ServiceProvider extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('CleanCRMForm');
	}
    
    function about()
    {
        $data = array(
            'head' => $this->load->view('templates/head', array(), TRUE),
            'header' => $this->load->view('templates/header', array(), TRUE),
            'navtabs' => $this->load->view('templates/nav-tabs', array(), TRUE),
            'sidebar' => $this->load->view('templates/sidebar', array(), TRUE),
            'foot' => $this->load->view('templates/foot', array(), TRUE)
        );
        $this->load->view('serviceProvider/about', $data);
    }

    function register()
    {
        $data = array(
            'head' => $this->load->view('templates/head', array(), TRUE),
            'header' => $this->load->view('templates/header', array(), TRUE),
            'navtabs' => $this->load->view('templates/nav-tabs', array(), TRUE),
            'sidebar' => $this->load->view('templates/sidebar', array(), TRUE),
            'foot' => $this->load->view('templates/foot', array(), TRUE),
            'form' =>  $this->cleancrmform->cleanCRMForm("ServiceProviderRegistration")
        );
        $this->load->view('serviceProvider/register', $data);
    }

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$this->load->view('serviceProvider/index', $data);
			
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
