<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($mylang='es')
	{
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $this->lang->load('index', $idiom);
        $this->lang->load('footer', $idiom);
        $this->load->helper('url');
        $data['title'] = 'WordPress.com: crea un sitio web o un blog gratuitos';
        $this->load->view('templates/header.php',$data);
        $data['mylang']=$mylang;
        $this->load->view('index/index.php',$data);
        $this->load->view('templates/footer.php',$data);
	}
}
