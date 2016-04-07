<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Follow extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title'] = '我关注的问题 - 沙湖';
    $this->load->view('user/template/header' , $data);
    $this->load->view('user/follow/follow');
    $this->load->view('user/template/footer');
  }
}

?>
