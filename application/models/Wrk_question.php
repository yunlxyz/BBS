<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 问题列表模型
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Wrk_question extends CI_Model{

  /**
   * 查找问题并且分页
   * 根据偏移量分页
   * @param  int    $offset [description]
   * @return array          [description]
   */
  public function query_question($offset){
    $sql = 'SELECT
              q.* , t.topic_title , t.topic_avatar
            FROM
              wrk_question q INNER JOIN basic_topic t ON q.question_class = t.id
            WHERE q.answer_count !=0
            ORDER BY q.question_time
            LIMIT ? , 10';
    $query = $this->db->query($sql , array($offset));
    return $query->result();
  }

  /**
   * 查询所有问题并且分页
   * 每页15条数据
   *
   * @return array [description]
   */
  public function query_question_all(){
    $sql = 'SELECT *
            FROM wrk_question q
            ORDER BY q.question_time DESC';
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function query_question_singal($question_id){
    $sql = 'SELECT q.* , t.topic_title
            FROM wrk_question q INNER JOIN basic_topic t ON q.question_class = t.id
            WHERE q.id = ?';
    $query = $this->db->query($sql , array($question_id));
    return $query->result();
  }

  public function add_question_piblish($question_title , $question_decs , $question_type , $question_time , $questioner){
    $sql = 'INSERT INTO wrk_question(question_title , question_desc , question_class , question_time , questioner)
            VALUES(? , ? , ? , ? , ?)';
    $query = $this->db->query($sql , array($question_title , $question_decs , $question_type , $question_time , $questioner));
    return $query;
  }
}

?>
