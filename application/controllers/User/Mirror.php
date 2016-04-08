<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Mirror extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '未闻花名 的个人主页 - 沙湖';
      $this->load->view('user/template/header' , $info);
      $data['info'] = $this->user_info($info['user']);
      $this->load->view('User/mirror/mirror' , $data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }

  public function user_info($account){
    $this->load->model('Basic_user');
    $result = $this->Basic_user->query_user_info($account);
    return $result;
  }

}

?>
