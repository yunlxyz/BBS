<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 回答列表模型
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Wrk_answer extends CI_Model
{
  /**
   * 查询点赞数最多的问题的评论
   *
   * @param  int   $question_id [description]
   * @return array              [description]
   */
  public function query_hottest_answer($question_id){
    $sql = 'SELECT a.* , u.introduction , u.user_avatar
            FROM wrk_answer a INNER JOIN basic_user u ON a.answerer = u.account
            WHERE a.question_id = ? AND
                  a.like_count = (SELECT MAX(like_count) FROM wrk_answer WHERE question_id = ?)';
    $query = $this->db->query($sql , array($question_id , $question_id));
    log_message('info' , $sql);
    return $query->result();
  }

  /**
   * 查询所有答案
   * 根据问题ID查询该问题的所有答案
   *
   * @param  int    $question_id [description]
   * @param  int    $offset      [description]
   * @param  int    $rows        [description]
   * @return array               [description]
   */
  public function query_answer_all($question_id , $offset , $rows){
    $sql = 'SELECT a.* , u.introduction , u.user_avatar
            FROM wrk_answer a INNER JOIN basic_user u ON a.answerer = u.account
            WHERE a.question_id = ?
            LIMIT ? , ?';
    $query = $this->db->query($sql , array($question_id , $offset , $rows));
    log_message('info' , $sql);
    return $query->result();
  }

  /**
   * 发布问题
   *
   * @param  [type] $answer_decs [description]
   * @param  [type] $answerer    [description]
   * @param  [type] $answer_time [description]
   * @param  [type] $question_id [description]
   * @return [type]              [description]
   */
  public function save_publish_answer($answer_decs , $answerer , $answer_time , $question_id){
    $sql = 'INSERT INTO wrk_answer (answer_decs , answerer , answer_time , question_id)
            VALUES (? , ? , ? ,?)';
    $query = $this->db->query($sql , array($answer_decs , $answerer , $answer_time , $question_id));
    return $query->result();
  }

  public function query_answer_by_account($account , $offset){
    $sql = 'SELECT q.* , a.answer_decs , a.answer_time
            FROM wrk_answer a
              INNER JOIN wrk_question q ON a.question_id = q.id
            WHERE a.answerer = ?
            ORDER BY a.answer_time DESC
            LIMIT ? , 10';
    $query = $this->db->query($sql , array($account , $offset));
    return $query->result();
  }

  public function query_answer_count($account){
    $sql = 'SELECT COUNT(*) as count
            FROM wrk_answer q
            WHERE q.answerer = ?';
    $query = $this->db->query($sql , array($account));
    return $query->result();
  }
}

?>
