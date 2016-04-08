<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 主页类，首页渲染
 * 主要用于主页的显示
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Index extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  /**
   * 首页渲染
   */
  public function index(){
    if (isset($_SESSION['account'])) {
      $info['title'] = '首页 - 沙湖社区';
      $info['user'] = $_SESSION['account'];
      $this->load->view('user/template/header' , $info);
      $result['data'] =$this->query_question();
      $this->load->view('user/index' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: index.php/User/Login/index');
    }
  }

  /**
   * 首页问题查询
   *
   * @return array $data [description]
   */
  public function query_question(){
    $this->load->model('Wrk_question');
    $offset = 0;
    $data = array();
    $i = 0;
    $result = $this->Wrk_question->query_question($offset);
    foreach ($result as $key => $value) {
        $tmp_answer = $this->query_hottest_answer((int)$value->id);
        $data[$i]['question'] = (array)$value; //问题数组
        $data[$i]['answer'] = (array)$tmp_answer[0]; //回答列表
        $i ++;
    }
    return $data;
  }

  /**
   * 查询首页中点赞数最多的问题的评论
   *
   * @param  int  $question_id [description]
   * @return array             [description]
   */
  public function query_hottest_answer($question_id){
    $this->load->model('Wrk_answer');
    return $this->Wrk_answer->query_hottest_answer($question_id);
  }
}

?>
