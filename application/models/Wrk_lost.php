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

  public function save_new_lost_info($lost_goods , $lost_address , $lost_time , $contact , $publish_time , $type="丢失"){
    $sql = 'INSERT INTO wrk_lost(lost_goods , pick_up_time , pick_up_address , contact_info , publish_time , type , status)
            VALUES(? , ? , ? , ? , ? , ? , 0)';
    $query = $this->db->query($sql , array($lost_goods ,$lost_time , $lost_address , $contact , $publish_time , $type));
    return $query;
  }
}

?>
