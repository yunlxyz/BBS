<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class News extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title'] = '发现,每天不一样的湖大 - 沙湖';
    $this->load->view('user/template/header' , $data);
    $this->load->view('user/news/news');
    $this->load->view('user/template/footer');
  }
}

?>
