<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Wrk_sports extends CI_Model{

  public function query_sports_info($rows , $offset){
	  
    $sql = 'SELECT
				a.*, num
			FROM
				wrk_sports a
			LEFT JOIN (
				SELECT
					follow_sport,
					count(DISTINCT b.follower) AS num
				FROM
					wrk_sports_follow b
				GROUP BY
					b.follow_sport
			) bb ON a.id = bb.follow_sport
            ORDER BY a.publish_time DESC
            LIMIT ? , ?';
    $query = $this->db->query($sql , array($rows , $offset));
    return $query->result();
  }

  public function save_sports_info($sports_time , $sports_type , $contacts , $publisher ,$publish_time){
    $sql = 'INSERT INTO wrk_sports (sports_time , sports_type , contacts , publisher , publish_time)
            VALUES (? , ? , ? , ? , ?)';
    $query = $this->db->query($sql , array($sports_time , $sports_type , $contacts , $publisher ,$publish_time));
    return $query;
  }
}
