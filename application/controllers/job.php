<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('tank_auth');
    }

    function index()
    {
        redirect('/job/add/');
    }

    function add()
    {
        $data = array(
            'head' => $this->load->view('templates/head', array(), TRUE),
            'header' => $this->load->view('templates/header', array(), TRUE),
            'hero' => $this->load->view('templates/hero', array(), TRUE),
            'navtabs' => $this->load->view('templates/nav-tabs', array(), TRUE),
            'sidebar' => $this->load->view('templates/sidebar', array(), TRUE),
            'footer' => $this->load->view('templates/footer', array(), TRUE)
            'foot' => $this->load->view('templates/foot', array(), TRUE)
        );
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $this->load->view('job/add', $data);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */