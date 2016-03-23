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
    $this->load->view('user/template/header');
    $this->load->view('User/mirror/mirror');
    $this->load->view('user/template/footer');
  }
}

?>
