<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title'] = '沙湖 － 带你遨游湖大，走向不一样的世界';
    $this->load->view('User/login/login' , $data);
  }
}

?>
