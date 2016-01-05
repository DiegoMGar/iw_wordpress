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

        $oid = $this->session->id;

        $sql = "
            select * from domains
            left join blogs on (blogs.domain = domains.oid)
           where blogs.oid is not null
           and domains.user = $oid";
        $query = $this->db->query($sql);

        $data['title'] = 'Dashboard';
        $data['query'] = $query;
		$this->load->view('templates/header.php', $data);
		$this->load->view('dashboard.php');

	}

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }


}