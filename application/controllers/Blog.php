<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');
    }


	public function index() {
		redirect(base_url());
	}

	public function loader($url) {

		$sql = "
			select domains.user, domains.url, blogs.oid, blogs.title, blogs.description from domains
            right join blogs on (blogs.domain = domains.oid)
            where blogs.oid is not null
            and domains.url = '$url'";

        $query = $this->db->query($sql);

		foreach ($query->result() as $row) {
			$domainBlog = array(
				'userId' => $row->user,
				'blogId' => $row->oid
			);
		}

		$blogOID = $domainBlog['blogId'];

		$sql2 = "
		select * from posts
		where blog=$blogOID";

        $post = $this->db->query($sql2);

        $data['title'] = 'Blog';
        $data['post'] = $post;
        $data['url'] = $url;
		$this->load->view('templates/header.php', $data);

		if($this->session->logged_in == TRUE && ($this->session->id == $domainBlog['userId']))
		{
			$this->load->view('blog-admin-header.php');
		}

		$this->load->view('blog.php');
	}

	public function addPost($url) {

		$tituloPost = $this->input->post('titulo');
		$contenidoPost = $this->input->post('contenido');

		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();

		$dateHour = mdate($datestring, $time);

		$datos = array(
			'title' => $tituloPost,
			'content' => $contenidoPost,
			'location' => null,
			'date' => $dateHour,
			'blog' =>  2
		);

		$this->db->insert('posts', $datos);

		redirect(base_url('blog/loader/' . $url), 'refresh');
	}
}