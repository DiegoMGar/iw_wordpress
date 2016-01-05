<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }


	public function index() {
		$data['title'] = 'Login';
		$this->load->view('templates/header.php', $data);
		$this->load->view('login.php');
		//$this->load->view('templates/footer.php');
	}

	public function checkCredentials() {

		$userEmail = $this->input->post('email');
		$userPass = $this->input->post('password');

		$sql = "SELECT * FROM users WHERE email = ? and password = ?";
		$query = $this->db->query($sql, array($userEmail, $userPass));

		if($query->num_rows()==1)
		{

			$newdata = null;

			foreach ($query->result() as $row) {
				$newdata = array(
					'id' => $row->oid,
			        'name'  => $row->name,
			        'email'     => $row->email,
			        'logged_in' => TRUE
				);
			}

			$this->session->set_userdata($newdata);
			redirect(base_url('dashboard'), 'refresh');
		}

		else 
		{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger animationFade">
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        	<strong>Error!</strong> Usuario o contraseña incorrectos.
  			</div>');
			redirect(base_url('login'));
		}

	}
}