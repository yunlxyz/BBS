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
    $data['title'] = '20 岁女生怎么买到有档次而不奢侈的衣服？ - 沙湖';
    $this->load->view('user/template/header' , $data);
    $this->load->view('user/question/question');
    $this->load->view('user/template/footer');
  }

  public function index_all(){
    $data['title'] = '所有问题 - 沙湖';
    $this->load->view('user/template/header' , $data);
    $this->load->view('user/question/question_all');
    $this->load->view('user/template/footer');
  }
}
?>
