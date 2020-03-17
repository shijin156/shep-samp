<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adminfunc extends CI_Model{
    function logincheck($uname, $upass){
      $this->db->select('user_id');
      $this->db->from('admin');
      $this->db->where('username',$uname);
      $this->db->where('password',$upass);
      $query = $this->db->get();
      if ($query->num_rows()>0) {
        return true;
      }
      else {
        return false;
      }
    }
    public function get_recent(){
      $this->db->select('*');
      $this->db->from('voices');
      $query = $this->db->get();
      return $query->result();
    }
    public function get_recentupdated(){
      $this->db->select('*');
      $this->db->from('voices');
      //$this->db->order_by('date_updated','DESC');
      $query = $this->db->get();
      return $query->result();
    }
    public function allvoices(){
      $this->db->select('*');
      $this->db->from('voices');
      //$this->db->order_by('date_updated', 'DESC');
      $query = $this->db->get();
      return $query->result();
    }
    public function addvoice($data) {
      $this->db->insert('voices', $data);
      $query=$this->db->insert_id();
      return $query;
    }
    public function geteditvoices($vid) {
      $this->db->select('*');
      $this->db->from('voices');
      $this->db->where('user_id', $vid);
      $query = $this->db->get();
      return $query->result();
    }
    public function updatevoice($data, $vid) {
      $this->db->set($data);
  		$this->db->where('user_id',$vid);
  		$query=$this->db->update('voices');
  		return $query;
    }
    public function updatedemoorder($data,$id) {
      $this->db->set('liord', $id);
    	$this->db->where('id', $data);
    	$this->db->update('demos');
      return true;
    }
    public function deletevoices($vid) {
      $this->db->where('user_id', $vid);
      if($this->db->delete('voices')) {
        return true;
      }
      else {
        return false;
      }
    }
    public function updateimage($val,$userid) {
      $query = $this->db->replace('profileimg',$val);
      $dateup = array(
                    'date_updated' => date("Y-m-d H:i:s"),
                  );
      $this->db->set($dateup);
      $this->db->where('user_id',$userid);
  		$this->db->update('voices');
      return $query;
    }
    public function uploaddemos($val,$userid) {
      $query = $this->db->replace('demos',$val);
      $dateup = array(
                    'date_updated' => date("Y-m-d H:i:s"),
                  );
      $this->db->set($dateup);
      $this->db->where('user_id',$userid);
  		$this->db->update('voices');
      return $query;
    }
    public function updatedemoinfo($val,$did,$uid) {
      $this->db->set($val);
      $this->db->where('id',$did);
      $query = $this->db->update('demos');
      $dateup = array(
                    'date_updated' => date("Y-m-d H:i:s"),
                  );
      $this->db->set($dateup);
      $this->db->where('user_id',$uid);
  		$this->db->update('voices');
      return $query;
    }
    public function deleteimage($id) {
      $this->db->where('userid', $id);
      $query = $this->db->delete('profileimg');
      $dateup = array(
                    'date_updated' => date("Y-m-d H:i:s"),
                  );
      $this->db->set($dateup);
      $this->db->where('user_id',$id);
  		$this->db->update('voices');
      return $query;
    }
    public function deletedemo($id,$user) {
      $this->db->where('id', $id);
      $query = $this->db->delete('demos');
      $dateup = array(
                    'date_updated' => date("Y-m-d H:i:s"),
                  );
      $this->db->set($dateup);
      $this->db->where('user_id',$user);
  		$this->db->update('voices');
      return $query;
    }
    public function deletefolder($id) {
      $this->db->where('uslug', $id);
      $query = $this->db->delete('rlinks');
      return $query;
    }
    public function getimage($id) {
      $this->db->select('*');
      $this->db->from('profileimg');
      $this->db->where('userid', $id);
      $query = $this->db->get();
      return $query->result();
    }
    public function getdemos($id) {
      $this->db->select('*');
      $this->db->from('demos');
      $this->db->where('userid', $id);
      $this->db->order_by('liord','ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function getcats() {
      $this->db->select('*');
      $this->db->from('categories');
      $this->db->order_by('corder','ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function searchvoices($search) {
      $this->db->select('*');
      $this->db->from('voices');
      $this->db->like('fname',$search);
      $this->db->or_like('lname',$search);
      $query = $this->db->get();
      return $query->result();
    }
    public function getallpage() {
      $this->db->select('*');
      $this->db->from('pages');
      $query = $this->db->get();
      return $query->result();
    }
    public function geteditpage($pid) {
      $this->db->select('*');
      $this->db->from('pages');
      $this->db->where('id', $pid);
      $query = $this->db->get();
      return $query->result();
    }
    public function updatepage($data, $pid) {
      $this->db->set($data);
  		$this->db->where('id',$pid);
  		$query=$this->db->update('pages');
  		return $query;
    }
    public function get_share_users(){
      $this->db->select('*');
      $this->db->from('rlinks');
  		//$this->db->where('id',$id);
      $query = $this->db->get();
      return $query->result();
    }
    public function get_edit_users($id){
      $this->db->select('*');
      $this->db->from('rlinks');
      $this->db->where('id',$id);
      $query = $this->db->get();
      return $query->result();
    }
    public function get_user_slug($uid) {
      $this->db->select('*');
      $this->db->from('rlinks');
      $this->db->where('surl',$uid);
      $query = $this->db->get();
      return $query->result();
    }
    public function getsendemails($id){
      $this->db->select('*');
      $this->db->from('semail');
      $this->db->where('userid',$id);
      $query = $this->db->get();
      return $query->result();
    }
    public function update_users($data, $id) {
      $this->db->set($data);
      $this->db->where('id',$id);
      $query=$this->db->update('rlinks');
      return $query;
    }
    public function addclient($data) {
      $this->db->insert('rlinks', $data);
      $query=$this->db->insert_id();
      return $query;
    }
    public function sendemail($datas) {
      $this->db->insert('semail', $datas);
      $query=$this->db->insert_id();
      return $query;
    }
    public function createproject($datas) {
      $this->db->insert('rlinks', $datas);
      $query=$this->db->insert_id();
      return $query;
    }
    public function checkdownload($id) {
      $this->db->select('*');
      $this->db->from('rlinks');
      $this->db->where('surl',$id);
      $query = $this->db->get();
      return $query->result();
    }
    public function getprojectdata($uid) {
      $this->db->select('*');
      $this->db->from('rlinks');
      $this->db->where('id',$uid);
      $query = $this->db->get();
      return $query->result();
    }
  }
