<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 3/12/15
 * Time: 9:37
 */
class Read_session extends CI_Model {
    public function __construct(){
        $this->load->library('session');
    }
    public function isSessionActive(){
        if($this->session->logged_in===TRUE){
            return true;
        }
        return false;
    }
}