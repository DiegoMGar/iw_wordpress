<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index($idUser, $mylang='es') {
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $data['mylang'] = $mylang;

        $sql = "
        select * from users
        where oid=$idUser";
        $query = $this->db->query($sql);

        if($query->num_rows()==1)
        {

            foreach ($query->result() as $row) {
                $user = array(
                    'id' => $row->oid, 
                    'nick' => $row->nick, 
                    'name' => $row->name,
                    'surname' => $row->surname,
                    'email' => $row->email
                );
            }

            $data['title'] = 'Dashboard';
            $data['user'] = $user;
        	$this->load->view('templates/header.php', $data);
            $this->load->view('profile.php');
        }

        else
        {
            show_error("User not found!");
        }
    }
}