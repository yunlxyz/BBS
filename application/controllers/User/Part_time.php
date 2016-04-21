<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Part_time extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '兼职信息 - 沙湖';
      $this->load->view('user/template/header' , $info);

      // $result['news'] = $this->news_latest();
      $this->load->view('user/discuss/part_time');
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }
}
