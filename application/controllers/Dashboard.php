<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

	public function index() {
        $data['title'] = 'Dashboard';
		$this->load->view('templates/header.php', $data);
		$this->load->view('dashboard.php');
	}

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }


}