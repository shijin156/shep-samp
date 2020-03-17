<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
  public function index(){
    redirect('admin/login');
  }
  public function login(){
    if($this->session->userdata('LoggedIn')){
      redirect('admin/dashboard');
    }
    $data = array();
    $data['error_msg']='';
    if($this->input->post('submit')){
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == true) {
        $user=$this->input->post('username');
        $pass= md5($this->input->post('password'));
        $checkLogin = $this->adminfunc->logincheck($user, $pass);
        if($checkLogin){
         $this->session->set_userdata('LoggedIn',TRUE);
          redirect('admin/dashboard');
        }
        else{
          $data['error_msg'] = 'Wrong email or password, please try again.';
        }
      }
    }
    $this->load->view('admin/login', $data);
  }
  public function logout(){
    $this->session->unset_userdata('LoggedIn');
    $this->session->sess_destroy();
    redirect('admin/login');
  }
  public function dashboard() {
    if($this->session->userdata('LoggedIn')){
      $data['recent']=$this->adminfunc->get_recent();
      $data['update']=$this->adminfunc->get_recentupdated();
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/dashboard', $data);
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function allvoices() {
    if($this->session->userdata('LoggedIn')){
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/allvoices');
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function editvoice($id) {
    if($this->session->userdata('LoggedIn')){
      if(empty($id)) {
        redirect('admin/dashboard');
      }
      $data['error_msg']='';
      if($this->input->post('edit')){
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('slug', 'URL Slug', 'required|alpha_dash');
        $this->form_validation->set_rules('publish', 'Publish', 'required');
        if ($this->form_validation->run() == FALSE) {
        }
        else {
          $datas = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'slug'  => $this->input->post('slug'),
            'description' => $this->input->post('description'),
            'publish' => strip_tags($this->input->post('publish')),
            'date_updated' => date("Y-m-d H:i:s"),
          );
          $updatedata = $this->adminfunc->updatevoice($datas, $id);
           if($updatedata){
             $data['msg'] = 'Voice Updated Successfully.';
             redirect('admin/editvoice/'.$id.'');
           }
           else{
             $data['error_msg'] = 'Error while Updating Talent, please refresh and try again.';
           }
        }
      }
      $data['user_data'] = $this->adminfunc->geteditvoices($id);
      $data['user_id'] = $id;
      $data['profile'] = $this->adminfunc->getimage($id);
      $data['demos'] = $this->adminfunc->getdemos($id);
      $data['categories'] = $this->adminfunc->getcats();
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/editvoice',$data);
      $this->load->view('admin/uploadjs');
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function editproject($id) {
    if($this->session->userdata('LoggedIn')){
      if(empty($id)) {
        redirect('admin/dashboard');
      }
      $data['msg']='';
      if($this->input->post('edit')){
        $this->form_validation->set_rules('pname', 'Project Name', 'required');
        $this->form_validation->set_rules('uslug', 'URL Slug', 'required|alpha_dash');
        if ($this->form_validation->run() == FALSE) {
        }
        else {
          $datas = array(
            'cname' => $this->input->post('pname'),
            'uslug'  => $this->input->post('uslug'),
            'notes' => $this->input->post('notes'),
          );
          $updatedata = $this->adminfunc->update_users($datas, $id);
           if($updatedata){
             $data['msg'] = 'Project Updated Successfully.';
             redirect('admin/editproject/'.$id.'');
           }
           else{
             $data['msg'] = 'Error while Updating Project, please refresh and try again.';
           }
        }
      }
      $data['user_data'] = $this->adminfunc->getprojectdata($id);
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/editproject',$data);
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function createproject() {
    if($this->session->userdata('LoggedIn')){
      $data['msg']='';
      if($this->input->post('create')){
        $this->form_validation->set_rules('pname', 'Project Name', 'required');
        if ($this->form_validation->run() == FALSE) {
        }
        else {
          $slug=strtolower(preg_replace('![^a-z0-9]+!i', '-', strip_tags($this->input->post('pname')).random_string('alnum', 4)));
          $datas = array(
            'cname' => strip_tags($this->input->post('pname')),
            'uslug' => $slug,
            'notes' => $this->input->post('notes'),
            'surl'  => random_string('alnum', 16),
            'date_created' => date("Y-m-d H:i:s"),
          );
          $updatedata = $this->adminfunc->createproject($datas);
           if($updatedata){
             $upath = 'uploads/remote/'.$slug.'/';
               if (!is_dir($upath)) {
                   mkdir($upath, 0777, TRUE);
               }
               else
               {
                 //echo 'Folder Exists.';
               }
             $data['msg'] = 'Project Created Successfully.';
             redirect('admin/editproject/'.$updatedata.'');
           }
           else{
             $data['msg'] = 'Error while Adding Project, please refresh and try again.';
           }
        }
      }
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/createproject',$data);
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function editpage($id=null) {
    if($this->session->userdata('LoggedIn')){
      if($id==null) {
        $data['page_data'] = $this->adminfunc->getallpage();
        $this->load->view('admin/commonblocks/header');
        $this->load->view('admin/allpage',$data);
        $this->load->view('admin/commonblocks/footer');
      }
      else {
        $data['error_msg']='';
        if($this->input->post('edit')){
          $this->form_validation->set_rules('name', 'Name', 'required');
          $this->form_validation->set_rules('description', 'Description', 'required');
          if ($this->form_validation->run() == FALSE) {
          }
          else {
            $datas = array(
              'name' => strip_tags($this->input->post('name')),
              'description' => $this->input->post('description'),
              'date_updated' => date("Y-m-d H:i:s"),
            );
            $updatedata = $this->adminfunc->updatepage($datas, $id);
             if($updatedata){
               $data['msg'] = 'Page Updated Successfully.';
               redirect('admin/editpage/'.$updatedata.'');
             }
             else{
               $data['error_msg'] = 'Error while Updating Page, please refresh and try again.';
             }
          }
        }
        $data['page_data'] = $this->adminfunc->geteditpage($id);
        $this->load->view('admin/commonblocks/header');
        $this->load->view('admin/editpage',$data);
        $this->load->view('admin/commonblocks/footer');
      }
    }
    else{
      redirect('admin/login');
    }
  }
  public function delvoice($id) {
    if($this->session->userdata('LoggedIn')){
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/delvoice');
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function addvoice(){
    if($this->session->userdata('LoggedIn')){
      $data['error_msg']='';
      if($this->input->post('add')){
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('publish', 'Publish', 'required');
        if ($this->form_validation->run() == FALSE) {
        }
        else {
          $stringf = strtolower(preg_replace('![^a-z0-9]+!i', '-', $this->input->post('fname')));
          $stringl = strtolower(preg_replace('![^a-z0-9]+!i', '-', $this->input->post('lname')));
          $slug=$stringf.'-'.$stringl;
          $datas = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'slug'  => $slug,
            'description' => $this->input->post('description'),
            'publish' => strip_tags($this->input->post('publish')),
            'date_created' => date("Y-m-d H:i:s"),
            'date_updated' => date("Y-m-d H:i:s"),
          );
          $updatedata = $this->adminfunc->addvoice($datas);
           if($updatedata){
             $data['msg'] = 'Data Updated Successfully.';
             redirect('admin/editvoice/'.$updatedata.'');
           }
           else{
             $data['error_msg'] = 'Error while Adding Talent, please refresh and try again.';
           }
        }
      }
      //$data['user_data'] = $this->adminfunc->get_datas();
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/addvoice',$data);
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function uploadprofilepic($id) {
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
    if($this->session->userdata('LoggedIn')){
			$upath = 'uploads/profilepics/'.$id.'/';
			if (!is_dir($upath)) {
			    mkdir($upath, 0777, TRUE);
			}
      if (isset($_FILES['upload_profilepic']) && !empty($_FILES['upload_profilepic'])) {
				foreach($_FILES['upload_profilepic']['name'] as $name=>$value) {
					$file_name = explode(".", $_FILES['upload_profilepic']['name'][$name]);
					$allowed_extension = array("jpg","jpeg","png","gif");
					if(!in_array($file_name[1],$allowed_extension)) {
						echo '<br />Invalid File Format. Upload Image with jpg, jpeg, png, gif extension only.';
						die();
					}
				}
        $no_files = count($_FILES["upload_profilepic"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["upload_profilepic"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["upload_profilepic"]["error"][$i] . "<br>";
            } else {
                if (file_exists($upath . $_FILES["upload_profilepic"]["name"][$i])) {
										$_FILES["upload_profilepic"]["name"][$i] = rand(1,99).$_FILES["upload_profilepic"]["name"][$i];
                }
								$_FILES["upload_profilepic"]["name"][$i] = rand(1,99).str_replace(' ', '_', $_FILES["upload_profilepic"]["name"][$i]);
                move_uploaded_file($_FILES["upload_profilepic"]["tmp_name"][$i], $upath . $_FILES["upload_profilepic"]["name"][$i]);
								$ipuploads[$i] = $_FILES["upload_profilepic"]["name"][$i];
            }
        }
				$newuploadsp = array( 'userid' => $id ,
                              'url'    => implode('',$ipuploads)
                          );
				if($this->adminfunc->updateimage($newuploadsp,$id)) {
					//echo $newuploadsp;
				}
      }
			else {
        echo 'Please choose at least one file';
      }
    }
		else {
        echo "Access Restricted";
    }
	}
  public function deleteprofilepic($id) {
    if (!$this->input->is_ajax_request()) {
       exit('No direct script access allowed');
    }
    if($this->session->userdata('LoggedIn')){
      $dirname = 'uploads/profilepics/'.$id.'/';
      if($this->adminfunc->deleteimage($id)) {
        if (is_dir($dirname))
          $dir_handle = opendir($dirname);
        if (!$dir_handle)
             return false;
        while($file = readdir($dir_handle)) {
              if ($file != "." && $file != "..") {
                   if (!is_dir($dirname."/".$file))
                        unlink($dirname."/".$file);
                   else
                        delete_directory($dirname.'/'.$file);
              }
        }
        closedir($dir_handle);
        rmdir($dirname);
      }
    }
    else {
        echo "Access Restricted";
    }
  }
  public function deletefile() {
    if (!$this->input->is_ajax_request()) {
       exit('No direct script access allowed');
    }
    if($this->session->userdata('LoggedIn')){
      $filename = $this->input->post('filename');
      if(unlink(FCPATH."/".$filename)) {
        echo 'File Deleted Successfully';
      }
      else {
        echo 'Error Deleting File.';
      }
    }
    else {
        echo "Access Restricted";
    }
  }
  public function demodelete($id) {
    if (!$this->input->is_ajax_request()) {
       exit('No direct script access allowed');
    }
    if($this->session->userdata('LoggedIn')){
      $userid = $this->input->post('userid');
      $file = $this->input->post('filename');
      $dirname = 'uploads/demos/'.$userid.'/';
      if($this->adminfunc->deletedemo($id,$userid)) {
        unlink($dirname.$file);
      }
    }
    else {
        echo "Access Restricted";
    }
  }
  public function folderdelete() {
    if (!$this->input->is_ajax_request()) {
       exit('No direct script access allowed');
    }
    if($this->session->userdata('LoggedIn')){
      $slug = $this->input->post('slug');
      $dirname = 'uploads/remote/'.$slug.'/';
      if($this->adminfunc->deletefolder($slug)) {
        delete_files($dirname, true);
        rmdir($dirname);
      }
    }
    else {
        echo "Access Restricted";
    }
  }
  public function uploaddemos($id) {
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
    if($this->session->userdata('LoggedIn')){
			$upath = 'uploads/demos/'.$id.'/';
			if (!is_dir($upath)) {
			    mkdir($upath, 0777, TRUE);
			}
			if (isset($_FILES['upload_demos']) && !empty($_FILES['upload_demos'])) {
				foreach($_FILES['upload_demos']['name'] as $name=>$value) {
					$file_name = explode(".", $_FILES['upload_demos']['name'][$name]);
					$allowed_extension = array("mp3","MP3");
					if(!in_array($file_name[1],$allowed_extension)) {
						echo '<br />Invalid File Format. Upload MP3 only.';
						die();
					}
				}
        $no_files = count($_FILES["upload_demos"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["upload_demos"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["upload_demos"]["error"][$i] . "<br>";
            } else {
                if (file_exists($upath . $_FILES["upload_demos"]["name"][$i])) {
                    $_FILES["upload_demos"]["name"][$i] = rand(1,99).$_FILES["upload_demos"]["name"][$i];
                }
								$_FILES["upload_demos"]["name"][$i] = rand(1,99).str_replace(' ', '_', $_FILES["upload_demos"]["name"][$i]);
                move_uploaded_file($_FILES["upload_demos"]["tmp_name"][$i], $upath . $_FILES["upload_demos"]["name"][$i]);
								$iuploads[$i] = $_FILES["upload_demos"]["name"][$i];
                $data = array(
                              'userid'  =>  $id,
                              'durl'    =>  $_FILES["upload_demos"]["name"][$i],
                            );
                $this->adminfunc->uploaddemos($data,$id);
            }
        }
      }
			else {
        echo 'Please choose at least one file';
      }

    }
		else {
        echo "Access Restricted";
    }
	}
  public function uploadcfiles($id) {
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
    if($this->session->userdata('LoggedIn')){
      $slug=$this->input->post('slug');
			$upath = 'uploads/remote/'.$slug.'/';
			if (isset($_FILES['upload_files']) && !empty($_FILES['upload_files'])) {
				foreach($_FILES['upload_files']['name'] as $name=>$value) {
					$file_name = explode(".", $_FILES['upload_files']['name'][$name]);
					$allowed_extension = array("mp3","MP3","zip","rar");
					if(!in_array($file_name[1],$allowed_extension)) {
						echo '<br />Invalid File Format. Upload MP3, Zip, Rar only.';
						die();
					}
				}
        $no_files = count($_FILES["upload_files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["upload_files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["upload_files"]["error"][$i] . "<br>";
            } else {
                if (file_exists($upath . $_FILES["upload_files"]["name"][$i])) {
                    $_FILES["upload_files"]["name"][$i] = rand(1,99).$_FILES["upload_files"]["name"][$i];
                }
								// file naming disabled $_FILES["upload_files"]["name"][$i] = str_replace(' ', '_', $_FILES["upload_files"]["name"][$i]);
                move_uploaded_file($_FILES["upload_files"]["tmp_name"][$i], $upath . $_FILES["upload_files"]["name"][$i]);
								//$iuploads[$i] = $_FILES["upload_files"]["name"][$i];
                echo 'Files Uploaded Successfully';
            }
        }
      }
			else {
        echo 'Please choose at least one file';
      }

    }
		else {
        echo "Access Restricted";
    }
	}
  public function demoinfoupdate($id) {
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
    if($this->session->userdata('LoggedIn')){
      $demoid = $this->input->post('demoid');
      $userid = $this->input->post('userid');
      $data = array(
                    'name'    =>  $this->input->post('DemoName'),
                    'category'    =>  $this->input->post('category'),
                    'gender'    =>  $this->input->post('gender'),
                    'age'    =>  $this->input->post('age'),
                    'vocal'    =>  $this->input->post('vocal'),
                    'lang'    =>  $this->input->post('language'),
                    'accent'    =>  $this->input->post('accent'),
                    'specs'    =>  $this->input->post('specs'),
                    'status'    =>  $this->input->post('status'),
                  );
      //print_r($data);
      $this->adminfunc->updatedemoinfo($data,$demoid,$userid);
    }
		else {
        echo "Access Restricted";
    }
	}
  public function demoorderupdate() {
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
    if($this->session->userdata('LoggedIn')){
      $snorder = json_decode($this->input->post('order_arr'));
      $sl=11;
      foreach($snorder as $key=>$value) {
        $sl=$sl+1;
        $this->adminfunc->updatedemoorder($value,$sl);
      }
    }
		else {
        echo "Access Restricted";
    }
	}
  public function searchvoices() {
    if($this->session->userdata('LoggedIn')){
      if(empty($this->input->post('searchvoices'))) {
        redirect('admin/dashboard');
      }
      $data['searchterm'] = $this->input->post('searchvoices');
      $data['search'] = $this->adminfunc->searchvoices($data['searchterm']);
      $this->load->view('admin/commonblocks/header', $data);
      $this->load->view('admin/searchvoices', $data);
      $this->load->view('admin/commonblocks/footer');
    }
    else {
        echo "Access Restricted";
    }
  }
  public function uploadclientfiles($id) {
    if($this->session->userdata('LoggedIn')){
      $data['msg']='';
      $data['id'] = $id;
      $data['user_data'] = $this->adminfunc->get_edit_users($id);
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/uploadfiles',$data);
      $this->load->view('admin/folderjs');
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function shareclient($id) {
    if($this->session->userdata('LoggedIn')){
      $data['msg']='';
      $data['id'] = $id;
      $data['user_data'] = $this->adminfunc->get_edit_users($id);
      foreach($data['user_data'] as $row) {
        $data['name']=$row->cname;
      }
      if($this->input->post('submit')){
        $this->form_validation->set_rules('subject', 'Email Subject', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
        }
        else {
          $data['alnum'] = random_string('alnum', 16);
          $this->load->config('email');
          $from = $this->config->item('smtp_user');
          $to = strip_tags($this->input->post('email'));
          $subject = strip_tags($this->input->post('subject'));
          $this->email->set_newline("\r\n");
          $this->email->from($from);
          $this->email->to($to);
          $this->email->subject($subject);
          $data['URL']=base_url().'downloadfiles/clientid/'.$id.'/'.$data['alnum'];
          $message = $this->load->view('emails/sendlink.php',$data,TRUE);
          $this->email->message($message);

          if ($this->email->send()) {
              $data['msg'].= 'Your Email has successfully been sent.';
              $data = array(
                'userid' => $id,
                'email' => strip_tags($this->input->post('email')),
                'act_id'  =>  $data['alnum'],
                'date_created' => date("Y-m-d H:i:s"),
              );
              $this->adminfunc->sendemail($data);
          }
          else {
              $data['msg'].= 'Error while Sending Email, please refresh and try again.';
              $data['msg'].= show_error($this->email->print_debugger());
          }
        }
      }
      $data['emailssent'] = $this->adminfunc->getsendemails($id);
      $this->load->view('admin/commonblocks/header');
      $this->load->view('admin/shareclient',$data);
      $this->load->view('admin/commonblocks/footer');
    }
    else{
      redirect('admin/login');
    }
  }
  public function send_remote_link() {
      if($this->session->userdata('LoggedIn')){
        $data['msg']='';
        $data['share_user'] = $this->adminfunc->get_share_users();
        $this->load->view('admin/commonblocks/header');
        $this->load->view('admin/send_remote_link', $data);
        $this->load->view('admin/folderjs');
        $this->load->view('admin/commonblocks/footer');
      }
      else{
        redirect('admin/login');
      }
  }
  public function filerename() {
    if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
    if($this->session->userdata('LoggedIn')){
      $oldname=$this->input->post('oldname');
      $newname=$this->input->post('newname');
      $slug=$this->input->post('slug');
      $oldfile='uploads/remote/'.$slug.'/'.$oldname;
      $newfile='uploads/remote/'.$slug.'/'.$newname;
      if(rename($oldfile, $newfile)) {
        echo 'File renamed Successfully';
      }
      else {
        echo 'Error renaming File';
      }
    }
		else {
        echo "Access Restricted";
    }
  }
}
