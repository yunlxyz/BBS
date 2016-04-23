<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 新闻查询模块
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Wrk_news extends CI_Model
{
  /**
   * 查询最新的新闻信息
   *
   * @return array [description]
   */
  public function query_news_latest(){
    $sql = 'SELECT *
            FROM wrk_news n
            ORDER BY n.news_time DESC';
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function query_news_signal($news_id){
    $sql = 'SELECT *
            FROM wrk_news n
            WHERE n.id = ?';
    $query = $this->db->query($sql , array($news_id));
    return $query->result();
  }
}

?>
