<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 5/01/16
 * Time: 9:13
 */

class Registro extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('read_session');
    }
    public function index($mylang='es'){
        if($this->read_session->isSessionActive() == TRUE)
        {
            redirect(base_url($mylang.'/dashboard'));
        }
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $data['title'] = 'Registro';
        $data['mylang']=$mylang;
        $this->lang->load('general',$idiom);
        $this->load->view('templates/header.php',$data);
        $this->load->view('registro/registro.php',$data);
    }
    public function action($mylang='es'){
        if($this->read_session->isSessionActive() == TRUE)
        {
            redirect(base_url($mylang.'/dashboard'));
        }
        if(strcmp($mylang,'es')!=0 && strcmp($mylang,'en')!=0){
            show_error("Ese lenguaje no existe");
        }
        $idiom='';
        if(strcmp($mylang,'es')==0)
            $idiom='spanish';
        else
            $idiom='english';
        $data['mylang']=$mylang;
        $this->lang->load('general',$idiom);
        $dominio = $this->input->post('dominio');
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');
        $titulo = $this->input->post('titulo');
        if(empty($dominio) || empty($usuario) || empty($password) || empty($password)){
            redirect(base_url($mylang.'/registro'));
        }
        $data['title'] = 'Registro';
        $this->load->view('templates/header.php',$data);
        $data['completo'] = TRUE;

        $this->load->database();

        $sql = "select oid from users where email = '{$usuario}' limit 1";
        $result = $this->db->query($sql);
        $contador = 0;
        foreach ($result->result() as $row) $contador++;
        if($contador>0){
            $data['completo'] = $this->lang->line('usuarioUsado');
            goto nosql;
        }

        $sql = "select oid from domains where url = '{$dominio}' limit 1";
        $result = $this->db->query($sql);
        $contador = 0;
        foreach ($result->result() as $row) $contador++;
        if($contador>0){
            $data['completo'] = $this->lang->line('dominioUsado');
            goto nosql;
        }

        $nick = explode('@',$usuario)[0];
        $sql = "insert into users (nick,name,password,email) values ('{$nick}','{$nick}','{$password}','{$usuario}')";
        if($this->db->query($sql)){
            $id_usuario = $this->db->insert_id();
            $sql = "insert into domains (url,user,payplan) values ('{$dominio}',$id_usuario,1)";
            if($this->db->query($sql)){
                $id_domain = $this->db->insert_id();
                $sql = "insert into blogs (title,domain,theme) values ('{$titulo}',$id_domain,1)";
                if($this->db->query($sql)){
                    $sql = "SELECT * FROM users WHERE email = ? and password = ?";
                    $query = $this->db->query($sql, array($usuario, $password));
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
                        $this->load->library('session');
                        $this->session->set_userdata($newdata);
                        redirect(base_url($mylang.'/dashboard'), 'refresh');
                    }else{
                        $data['completo'] = 'Error creando el blog del usuario.';
                    }
                }
                else{
                    $data['completo'] = 'Error creando el blog del usuario.';
                }
            }
            else{
                $data['completo'] = 'Error vinculando el usuario al dominio.';
            }
        }else{
            $data['completo'] = 'Error insertando el usuario.';
        }
        nosql:
        $this->load->view('registro/registro.php',$data);
    }
} 