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

	public function index($mylang='es') {
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';

        if($this->session->logged_in == TRUE)
        {
            $oid = $this->session->id;

            $sql = "
                select * from domains
                left join blogs on (blogs.domain = domains.oid)
               where blogs.oid is not null
               and domains.user = $oid";
            $query = $this->db->query($sql);

            $sql = "
                SELECT posts.title title, posts.date date FROM posts left join blogs on(blogs.oid = posts.blog)
                left join domains on (blogs.domain = domains.oid)
                where blogs.oid is not null and domains.oid is not null
                and domains.user = $oid";
            $historial = $this->db->query($sql);

            $data['title'] = 'Dashboard';
            $data['mylang'] = $mylang;
            $data['query'] = $query;
            $data['historial'] = $historial;
            $data['error'] = $this->session->flashdata('error');
            $this->load->view('templates/header.php', $data);
            $this->load->view('dashboard/dashboard.php',$data);
        }

        else
        {
            redirect(base_url($mylang.'/login'));
        }



	}

    public function logout($mylang='es') {
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $this->session->sess_destroy();
        redirect(base_url($mylang));
    }

    public function addDomain($mylang='es') {
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
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

        redirect(base_url($mylang.'/dashboard'), 'refresh');
    }

    public function deleteDomain($url,$mylang='es') {
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $this->db->delete('domains', array('url' => $url));
        redirect(base_url($mylang.'/dashboard'), 'refresh');
    }

    public function modifyDomainBlogView($url,$mylang='es') {
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $data['mylang']=$mylang;

        $sql = "
            select domains.url, domains.oid dID, blogs.oid bID, blogs.title, blogs.description from domains
            left join blogs on (blogs.domain = domains.oid)
            where blogs.oid is not null
            and domains.url = '{$url}'";
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            $domainBlog = array(
                'domainURL' => $row->url,
                'domainID' => $row->dID,
                'blogID' => $row->bID, 
                'title' => $row->title,
                'description' => $row->description
            );
        }

        $data['url'] = $url;
        $data['domainBlog'] = $domainBlog;
        $this->load->view('templates/header.php', $data);
        $this->load->view('blog/edit_blog.php', $data);

    }

    public function modifyDomainBlog($domainURL, $blogID,$mylang='es') {
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $newURL = $this->input->post('url');

        $sql = "select oid from domains where url = '{$newURL}' and oid <> {$blogID} limit 1";
        $result = $this->db->query($sql);
        $contador = 0;
        foreach ($result->result() as $row) $contador++;
        if($contador>0){
            $this->session->set_flashdata('error', 'Ese dominio está ocupado por otro usuario.');
        }

        else
        {
            $blogTitulo = $this->input->post('titulo');
            $blogDescripcion = $this->input->post('descripcion');

            $blogData = array(
                   'title' => $blogTitulo,
                   'description' => $blogDescripcion
                );

            $domainData = array(
                   'url' => $newURL
                );

            $this->db->where('oid', $blogID);
            $this->db->update('blogs', $blogData); 

            $this->db->where('url', $domainURL);
            $this->db->update('domains', $domainData);
        }

        redirect(base_url($mylang.'/dashboard'), 'refresh');
    }

}