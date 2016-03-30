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
    $sql = 'SELECT *
            FROM wrk_answer a
            WHERE a.question_id = ? AND
                  a.like_count = (SELECT MAX(like_count) FROM wrk_answer WHERE question_id = ?)';
    $query = $this->db->query($sql , array($question_id , $question_id));
    return $query->result();
  }
}

?>
