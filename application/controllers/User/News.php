<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class News extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Wrk_news');
  }

  public function index(){
    $data['title'] = '发现,每天不一样的湖大 - 沙湖';
    $this->load->view('user/template/header' , $data);
    
    $result['news'] = $this->news_latest();
    $this->load->view('user/news/news' , $result);
    $this->load->view('user/template/footer');
  }

  public function news_latest(){
    $result = $this->Wrk_news->query_news_latest();
    return $result;
  }
}

?>
