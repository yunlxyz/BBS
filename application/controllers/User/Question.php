<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Question extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $this->load->view('user/template/header');
    $this->load->view('user/question/question');
    $this->load->view('user/template/footer');
  }

  public function index_all(){
    $this->load->view('user/template/header');
    $this->load->view('user/question/question_all');
    $this->load->view('user/template/footer');
  }
}
?>
