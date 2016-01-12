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

        if($this->session->logged_in == TRUE)
        {
            $oid = $this->session->id;

            $sql = "
                select * from domains
                left join blogs on (blogs.domain = domains.oid)
               where blogs.oid is not null
               and domains.user = $oid";
            $query = $this->db->query($sql);

            $data['title'] = 'Dashboard';
            $data['query'] = $query;
            $data['error'] = $this->session->flashdata('error');
            $this->load->view('templates/header.php', $data);
            $this->load->view('dashboard.php');
        }

        else
        {
            redirect(base_url('login'));
        }



	}

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function addDomain() {

        $urlDomain = $this->input->post('url');
        $tituloBlog = $this->input->post('titulo');
        $descripcionBlog = $this->input->post('descripcion');
        $id_usuario = $this->session->id;

        $sql = "select oid from domains where url = '{$urlDomain}' limit 1";
        $result = $this->db->query($sql);
        $contador = 0;
        foreach ($result->result() as $row) $contador++;
        if($contador>0){
            $this->session->set_flashdata('error', 'Ese dominio está ocupado por otro usuario.');
        }

        else
        {
            $sql = "insert into domains (url,user,payplan) values ('{$urlDomain}',$id_usuario,1)";
            if($this->db->query($sql))
            {
                $id_domain = $this->db->insert_id();
                $sql = "insert into blogs (title,description,domain,theme) values ('{$tituloBlog}','{$descripcionBlog}',$id_domain,1)";
                $this->db->query($sql);
            }
            else
            {}
        }

        redirect(base_url('dashboard'), 'refresh');
    }

    public function deleteDomain($url) {

        $this->db->delete('domains', array('url' => $url));
        redirect(base_url('dashboard'), 'refresh');
    }


}