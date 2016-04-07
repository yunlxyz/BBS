<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Mirror extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title'] = '未闻花名 的个人主页 - 沙湖';
    $this->load->view('user/template/header' , $data);
    $this->load->view('User/mirror/mirror');
    $this->load->view('user/template/footer');
  }
}

?>
