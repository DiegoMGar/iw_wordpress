<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 3/12/15
 * Time: 8:59
 */
class Domain extends CI_Controller {
    /*public function __construct()
    {
        parent::__construct();
        $this->load->model('domains_model');
        $this->load->helper('url_helper');
        //$this->load->helper('form_helper');
    }
    public function index($dominio=FALSE){
        if(empty($dominio)){
            show_error('No se ha encontrado ningún blog en este dominio.',404,'Error 404');
        }
        $data['dominio'] = $this->domains_model->get_domains($dominio);
        if(empty($data['dominio'])){
            show_error('No se ha encontrado ningún blog en este dominio.',404,'Error 404');
        }
        $this->load->view('templates/header.php');
        $this->load->view('index/index.php');
        $this->load->view('templates/business_pen.php');
        $this->load->view('templates/free_pen.php');
        $this->load->view('templates/premium_pen.php');
        $this->load->view('templates/footer.php');
    }*/
}