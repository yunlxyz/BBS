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
              q.* , t.topic_decs
            FROM
              wrk_question q INNER JOIN basic_topic t ON q.question_class = t.id
            ORDER BY q.question_time
            LIMIT ? , 10';
    $query = $this->db->query($sql , array($offset));
    return $query->result();
  }
}

?>
