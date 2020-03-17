<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    public function getprofile($vid){
      $this->db->select('*');
      $this->db->from('voices');
      $this->db->join('profileimg', 'profileimg.userid=voices.user_id', 'left');
      $this->db->where('slug',$vid);
      $this->db->where('publish',1);
      $query = $this->db->get();
      return $query->result();
    }
    public function getdemos($vid) {
      $this->db->select('userid, durl, name, category');
      $this->db->from('demos');
      $this->db->where('userid', $vid);
      $this->db->where('status',1);
      $this->db->order_by('liord', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function getcategories() {
      $this->db->select('*');
      $this->db->from('categories');
      $this->db->order_by('corder', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function allvoicenames() {
      $this->db->select('*');
      $this->db->from('voices');
      $this->db->where('publish',1);
      $this->db->order_by('fname', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function allsearch($gen,$cat,$ages,$voc) {
      $this->db->select('user_id, voices.fname as vfname, voices.lname as vlname, slug, demos.name as cname, durl');
      $this->db->from('demos');
      $this->db->join('voices', 'voices.user_id=demos.userid', 'left');
      $this->db->join('categories', 'categories.id=demos.category', 'left');
      if(!empty($cat)) {
        $this->db->like('category', $cat);
      }
      if(!empty($gen)) {
        $this->db->like('gender', $gen);
      }
      if(!empty($ages)) {
        $this->db->like('age', $ages);
      }
      if(!empty($voc)) {
        $this->db->like('vocal', $voc);
      }
      $this->db->where('status',1);
      $this->db->order_by('vfname', 'ASC');
      $this->db->order_by('vlname', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function alllanacc($gen,$lan) {
      $str = explode('-',$lan);
      if($str[0]=='a') $accen = $str[1];
      if($str[0]=='l') $langu = $str[1];
      $this->db->select('user_id, voices.fname as vfname, voices.lname as vlname, slug, demos.name as cname, durl');
      $this->db->from('demos');
      $this->db->join('voices', 'voices.user_id=demos.userid', 'left');
      $this->db->join('categories', 'categories.id=demos.category', 'left');
      if(!empty($gen)) {
        $this->db->like('gender', $gen);
      }
      if(isset($langu)) {
        $this->db->where('lang', $langu);
      }
      if(isset($accen)) {
        $this->db->where('accent', $accen);
      }
      $this->db->where('status',1);
      $this->db->order_by('vfname', 'ASC');
      $this->db->order_by('vlname', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function allspecs($gen,$pop) {
      $this->db->select('user_id, voices.fname as vfname, voices.lname as vlname, slug, demos.name as cname, durl');
      $this->db->from('demos');
      $this->db->join('voices', 'voices.user_id=demos.userid', 'left');
      $this->db->join('categories', 'categories.id=demos.category', 'left');
      if(!empty($gen)) {
        $this->db->like('gender', $gen);
      }
      $this->db->like('specs', $pop);
      $this->db->where('status',1);
      $this->db->order_by('vfname', 'ASC');
      $this->db->order_by('vlname', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }
    public function getpage($id) {
      $this->db->select('*');
      $this->db->from('pages');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->result_array();
    }
  }
