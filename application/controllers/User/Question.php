<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 问题控制器
 * 包括单个问题以及所有问题的查询控制器
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Question extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Wrk_question');
  }

  /**
   * 首页渲染以及传输数据
   * 根据问题ID查询单条问题
   *
   * @param  int   $question_id [description]
   * @return array              [description]
   */
  public function index($question_id){
    $tmp_result = $this->question_singal((int)$question_id);
    $data['title'] = $tmp_result[0]->question_title.' - 沙湖';
    $result['question'] = $tmp_result;
    $offset = 0;
    $rows = 15;
    $result['answer'] = $this->answer_all($question_id , $offset , $rows);
    $this->load->view('user/template/header' , $data);
    $this->load->view('user/question/question' , $result);
    $this->load->view('user/template/footer');
  }

  /**
   * 所有问题页面渲染数据传输
   *
   * @return array [description]
   */
  public function index_all(){
    $data['title'] = '所有问题 - 沙湖';
    $this->load->view('user/template/header' , $data);
    $result['question'] = $this->question_all();
    $this->load->view('user/question/question_all' , $result);
    $this->load->view('user/template/footer');
  }

  /**
   * 查询所有问题
   *
   * @return array [description]
   */
  public function question_all(){
    $result = $this->Wrk_question->query_question_all();
    return $result;
  }

  /**
   * 根据问题ID查询单条问题
   *
   * @param  int  $question_id [description]
   * @return array             [description]
   */
  public function question_singal($question_id){
    $result = $this->Wrk_question->query_question_singal($question_id);
    return $result;
  }

  /**
   * 查询所有的回答
   * 根据ID查询当亲问题的所有回答
   *
   * @param  int    $question_id [description]
   * @param  int    $offset      [description]
   * @param  int    $rows        [description]
   * @return array               [description]
   */
  public function answer_all($question_id , $offset , $rows){
    $this->load->model('Wrk_answer');
    $result = $this->Wrk_answer->query_answer_all($question_id , $offset , $rows);
    return $result;
  }

  public function question_publish(){
    Header("Access-Control-Allow-Origin: * ");
    Header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
    $question_title = $this->input->post('question_title');
    $question_decs = $this->input->post('question_decs');
    $question_= $this->input->post('question_type');
    $question_type = 1;
    $questioner = 'lvyun';
    $question_time = date('Y-m-d H:m:s' , time());
    $result = $this->Wrk_question->add_question_piblish($question_title , $question_decs , (int)$question_type , $question_time , $questioner);
    $data['code'] = '10000';
    $data['message'] = 'OK';
    echo json_encode($result);
  }

}
?>
