<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 关注话题模型
 *
 * 2016-04
 * @author pansichen 905424343@qq.com
 */
class Wrk_sports_follow extends CI_Model{
	
	/**
	 *  报名运动
	 *
	 */
	public function save_follow_sport($follower, $follow_sport, $follow_time ){
		$sql = "INSERT INTO wrk_sports_follow(follower, follow_sport, follow_time)
				VALUES ('$follower', $follow_sport, '$follow_time')";
		$query = $this->db->query($sql);
		return $query;
	}
	
	/**
	 * 取消报名
	 */
	 public function delete_follow_sport($follower, $follow_sport){
		 $sql = "DELETE FROM wrk_sports_follow WHERE follower = '$follower' AND follow_sport = $follow_sport";
		 $query = $this->db->query($sql);
		 return $query;
	 }
	
	/**
	 * 获取某人已报名的运动
	 *
	 */
	 public function get_fosp_by_account($account){
		 $sql = "SELECT follow_sport FROM wrk_sports_follow WHERE follower = '$account'";
		 $query = $this->db->query($sql);
		 return $query->result();
	 }
	
	/**
	 * 获取某运动报名名单
	 */
	 public function get_fosp_by_sportid($sport_id){
		 $sql = "SELECT * FROM wrk_sports_follow WHERE follow_sport = $sport_id GROUP BY follower";
		 $query = $this->db->query($sql);
		 return $query->result();
	 }
	
}

