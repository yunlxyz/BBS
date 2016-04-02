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
  }

  public function index(){
    $data['title'] = '话题广场 - 沙湖';
    $this->load->view('user/template/header' , $data);

    $result['topic'] = $this->topic_all();
    $this->load->view('user/question/topics' , $result);
    $this->load->view('user/template/footer');
  }

  public function topic_all(){
    $result = $this->Basic_topic->query_topic_all();
    return $result;
  }
}

?>
