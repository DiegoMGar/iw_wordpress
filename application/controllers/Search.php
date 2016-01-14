<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 13/01/16
 * Time: 19:17
 */
class Search extends CI_Controller{
    public function index($mylang='es'){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('read_session');
        $data['mylang']=$mylang;
        if(strcmp($mylang,'en')==0)
            $idiom='english';
        else
            $idiom='spanish';
        $this->lang->load('general',$idiom);
        $datos = $this->input->post('query');
        $query ="select * from domains
                left join blogs on (blogs.domain = domains.oid)
               where blogs.oid is not null and
               (domains.url like '%{$datos}%' or
               blogs.title like '%{$datos}%')
               and domains.user <> {$this->session->id}
               order by domains.url,blogs.title
               limit 10";
        $data['query']=$this->db->query($query);
        $this->load->view('search/search.php',$data);
    }
}