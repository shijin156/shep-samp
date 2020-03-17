<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Downloadfiles extends CI_Controller {
  public function index() {
    show_404();
  }
  public function clientid($id=0) {
    $id=$this->uri->segment(3);
    if($id=='downloads'){
      $slug = $this->uri->segment(4);
      $filename = $this->uri->segment(5);
      $path = FCPATH.'uploads/remote/'.$slug.'/'.$filename;
      if (file_exists($path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($path).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        ob_clean();
        flush();
        readfile($path);
        unlink($path);
      } else {
          echo "The file $filename does not exist";
      }
    }
    else {
      $user=$this->adminfunc->get_user_slug($id);
      if(empty($user)) {
        show_404();
      }
      if($this->adminfunc->checkdownload($id)) {
        foreach($user as $row) {
          $data['name']=$row->cname;
          $data['slug']=$row->uslug;
          $data['notes']=$row->notes;
        }
        $data['title']='Download Files - Restricted Access - Sheppard Agency';
        $this->load->view('commonblocks/header',$data);
        $this->load->view('downloadfile',$data);
        $this->load->view('commonblocks/footer');
      }
      else {
        show_404();
      }
    }
  }
  public function downloadzip() {
    if (!$this->input->is_ajax_request()) {
       exit('No direct script access allowed');
    }
    $files = explode(",",$this->input->post('dfiles'));
    foreach($files as $row=>$value) {
      $new = explode("/", $value);
      $slug=$new[2];
      $nfiles[$row]=$new[3];
    }
    $cname=preg_replace("![^a-z0-9]+!i", "-", $this->input->post('cname'));
    $frad = random_string('alnum',3);
    $filename   =   'uploads/remote/'.$slug.'/'.$cname.'.zip';
    $zip = new ZipArchive;
    if ($zip->open($filename,  ZipArchive::CREATE)){
      foreach($files as $key=>$row) {
        $zip->addFile($row,$nfiles[$key]);
      }
      $zip->close();
      echo 'downloads/'.$slug.'/'.$cname.'.zip';
    }
    else{
       echo 'Failed Creating Zip File! Refresh and try again!';
    }
  }
}
