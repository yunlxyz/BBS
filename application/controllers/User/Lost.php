<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Lost extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '失物招领 - 沙湖';
      $this->load->view('user/template/header' , $info);

      $data['list'] = $this->lost_info();
      $this->load->view('user/discuss/lost_found' , $data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }

  public function lost_info(){
    $this->load->model('Wrk_lost');
    $result = $this->Wrk_lost->query_lost_info();
    return $result;
    // var_dump($result);
  }
}

?>
