<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Topics extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Basic_topic');
    $this->load->library('session');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '话题广场 - 沙湖';
      $this->load->view('user/template/header' , $info);

      $result['topic'] = $this->topic_all();
      $this->load->view('user/question/topics' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }

  public function topic_all(){
    $result = $this->Basic_topic->query_topic_all();
    return $result;
  }
}

?>
