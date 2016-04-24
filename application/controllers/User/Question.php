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
    $this->load->library('session');
  }

  /**
   * 首页渲染以及传输数据
   * 根据问题ID查询单条问题
   *
   * @param  int   $question_id [description]
   * @return array              [description]
   */
  public function index($question_id){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $tmp_result = $this->question_singal((int)$question_id);
      $info['title'] = $tmp_result[0]->question_title.' - 沙湖';
      $result['question'] = $tmp_result;
      $offset = 0;
      $rows = 15;
      $result['answer'] = $this->answer_all($question_id , $offset , $rows);
      $this->load->view('user/template/header' , $info);
      $this->load->view('user/question/question' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Register/index');
    }
  }

  /**
   * 所有问题页面渲染数据传输
   *
   * @return array [description]
   */
  public function index_all(){
    if (isset($_SESSION['account'])) {
      $page = $this->input->get('page');
      $page = empty($page)? 1 : $page;
      $info['user'] = $_SESSION['account'];
      $info['title'] = '所有问题 - 沙湖';
      $this->load->view('user/template/header' , $info);
      $result['question'] = $this->question_all($page);
      $this->load->view('user/question/question_all' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Register/index');
    }
  }

  /**
   * 查询所有问题
   *
   * @return array [description]
   */
  public function question_all($page){
    $offset = ($page - 1)*10;
    $result = $this->Wrk_question->query_question_all($offset);
    // var_dump($result);
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

  /**
   * 问题发布
   *
   * @return [type] [description]
   */
  public function question_publish(){
    Header("Access-Control-Allow-Origin: * ");
    Header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
    $question_title = $this->input->post('question_title');
    $question_decs = $this->input->post('question_decs');
    $question_type= $this->input->post('question_type');
    // $question_type = 1;
    $questioner = $_SESSION['account'];
    $question_time = date('Y-m-d H:i:s' , time());
    $data = array();
    $result = $this->Wrk_question->add_question_piblish($question_title , $question_decs , (int)$question_type , $question_time , $questioner);
    if ($result) {
      $data['code'] = '10000';
    }else {
      $data['code'] = '10001';
    }
    echo json_encode($data);
  }


  /**
   * 图片上传功能
   * 用户在回答问题时，需要上传图片功能，需要先将图片上传值服务器后返回图片地址
   *
   * @return [type] [description]
   */
  public function upload_image(){
    $this->load->helper('directory');
    // A list of permitted file extensions
    $allowed = array('png', 'jpg', 'gif','zip');
    if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($extension), $allowed)){
            echo '{"status":"error"}';
            exit;
        }
        if(move_uploaded_file($_FILES['file']['tmp_name'], BASEPATH.'../public/uploads/'.$_FILES['file']['name'])){
            $tmp='uploads/'.$_FILES['file']['name'];
            echo base_url().'public/uploads/'.$_FILES['file']['name'];
            exit;
        }
    }
    echo '{"status":"error"}';
    exit;
  }


  /**
   * 回答问题
   *
   * @return [type] [description]
   */
  public function publish_answer(){
    $this->load->model('Wrk_answer');

    $answer_decs = $this->input->post('code');
    $question_id = $this->input->post('qid');
    $answer_time = date('Y-m-d H:i:s' , time());
    $answerer = $_SESSION['account'];

    $result = $this->Wrk_answer->save_publish_answer($answer_decs , $answerer , $answer_time , $question_id);
  }

  public function get_question_count(){
    $account = $_SESSION['account'];
    $result = $this->Wrk_question->query_question_count($account);
    $data['count'] = ceil($result()/10);
    echo json_encode($result);
  }

}
?>
