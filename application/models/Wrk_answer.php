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

  public function save_publish_answer($answer_decs , $answerer , $answer_time , $question_id){
    $sql = 'INSERT INTO wrk_answer (answer_decs , answerer , answer_time , question_id)
            VALUES (? , ? , ? ,?)';
    $query = $this->db->query($sql , array($answer_decs , $answerer , $answer_time , $question_id));
    return $query->result();
  }
}

?>
