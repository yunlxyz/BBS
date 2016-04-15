<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Wrk_lost模块
 *
 * @author lvyun yunlxyz@163.com
 */
class Wrk_lost extends CI_Model{
  /**
   * 查询所有的失物招领信息
   *
   * @return [type] [description]
   */
  public function query_lost_info(){
    $sql = 'SELECT * FROM wrk_lost l ORDER BY l.publish_time DESC';
    $query = $this->db->query($sql , array());
    return $query->result();
  }
}

?>
