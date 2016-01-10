<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
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
				'id' => $row->user,
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
		$this->load->view('templates/header.php', $data);

		if($this->session->logged_in == TRUE && ($this->session->id == $domainBlog['id']))
		{
			$this->load->view('blog-admin-header.php');
		}

		$this->load->view('blog.php');

	}
}