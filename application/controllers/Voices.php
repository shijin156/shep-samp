<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voices extends CI_Controller {
 public function index() {
   $data['genders']='';
   $data['genderl']='';
   $data['gendera']='';
   $data['popular']='';
   $data['language']='';
   $data['category']='';
   $data['age']='';
   $data['vocal']='';
   $data['kids']='';
   $data['topverb']=$this->user->getpage(1);
   $data['botverb']=$this->user->getpage(2);
   $data['allvoices']=$this->user->allvoicenames();
   $data['genre']=$this->user->getcategories();
   $this->load->view('commonblocks/header');
   $this->load->view('voices',$data);
   $this->load->view('commonblocks/footer');
  }
  public function search() {
    if(empty($this->input->get('searchtype'))) {
      show_404();
    }
    if($this->input->get('age')==1){
      $data['kids']=1;
    }
    else {
      $data['kids']='';
    }
    $data['searchtype']=$this->input->get('searchtype');
    $data['genders']='';
    $data['genderl']='';
    $data['gendera']='';
    $data['popular']='';
    $data['language']='';
    $data['category']='';
    $data['age']='';
    $data['vocal']='';
    if($data['searchtype']=='allsearch') {
      $data['category'] = $this->input->get('category');
      $data['age'] = $this->input->get('age');
      $data['vocal'] = $this->input->get('vocal');
      $data['gendera'] = $this->input->get('gender');
      $data['demos']=$this->user->allsearch($data['gendera'], $data['category'], $data['age'], $data['vocal']);
          }
    if($data['searchtype']=='lanacc') {
      $data['language'] = $this->input->get('language');
      $data['genderl'] = $this->input->get('gender');
      $data['demos']=$this->user->alllanacc($data['genderl'], $data['language']);
    }
    if($data['searchtype']=='specs') {
      $data['genders'] = $this->input->get('gender');
      $data['popular'] = $this->input->get('popular');
      $data['demos']=$this->user->allspecs($data['genders'], $data['popular']);
    }
    $data['topverb']=$this->user->getpage(1);
    $data['botverb']=$this->user->getpage(2);
    $data['allvoices']=$this->user->allvoicenames();
    $data['genre']=$this->user->getcategories();
    $this->load->view('commonblocks/header');
    $this->load->view('voices',$data);
    $this->load->view('search',$data);
    $this->load->view('commonblocks/footer');
  }
  public function voice() {
    $slug=strip_tags($this->uri->segment(2));
    $data['profile']=$this->user->getprofile($slug);
    if(empty($data['profile'])) {
      show_404();
    }
    foreach($data['profile'] as $rows) {
      $dat['title']=$rows->fname.' '.$rows->lname;
      $id=$rows->user_id;
    }
    $data['categories']=$this->user->getcategories();
    $data['demos']=$this->user->getdemos($id);
    $this->load->view('commonblocks/header',$dat);
    $this->load->view('talent_template',$data);
    $this->load->view('commonblocks/footer');
  }
}
