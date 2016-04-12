<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 关注问题页面
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Follow extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Wrk_question_follow');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '我关注的问题 - 沙湖';
      $this->load->view('user/template/header' , $info);
      $tmp_question = $this->follow($info['user']);
      $result['list'] = $tmp_question;
      $result['total'] = count($tmp_question);

      $this->load->view('user/follow/follow' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }

  /**
   * 关注的问题
   * 根据用户帐号查询所关注的问题
   *
   * @param  string $account [description]
   * @return [type]          [description]
   */
  public function follow($account){
    $this->load->model('Wrk_question');
    $result = $this->Wrk_question_follow->query_follow_question($account);
    foreach ($result as $key => $value) {
      $value->follow_question = $this->Wrk_question->query_question_singal($value->follow_question);
    }
    return $result;
  }

  /**
   * 用户关注问题操作
   * 用户点击按钮后通过ajax调用该方法
   * 关注成功返回20000，失败返回20001
   *
   * @return json [description]
   */
  public function follow_question(){
    $follow_question = $this->input->post('question_id');
    $follower = $_SESSION['account'];
    $follow_time = date('Y-m-d H:i:s' , time());
    $result = $this->Wrk_question_follow->save_follow_question($follower , $follow_time , $follow_question);
    if($result > 0){
      $data['code'] = 20000; //关注成功
    }else {
      $data['code'] = 20001; //关注失败
    }
    echo json_encode($data);
  }

  /**
   * 用户取消关注问题
   *
   * @return json [description]
   */
  public function unfollow_question(){
    $follow_question = $this->input->post('question_id');
    $follower = $_SESSION['account'];
    $result = $this->Wrk_question_follow->delete_follow_question($follower , (int)$follow_question);
    if($result > 0){
      $data['code'] = 20000; //取关成功
    }else {
      $data['code'] = 20001; //取关失败
    }
    echo json_encode($data);
  }
}

?>
