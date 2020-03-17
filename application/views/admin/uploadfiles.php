<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          foreach($user_data as $row) {
            $name=$row->cname;
            $slug=$row->uslug;
            $id=$row->id;
            $durl=$row->surl;
          } ?>
          <h1 class="m-0 text-dark">Files of <?php echo $name; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/send_remote_link'; ?>">Remote Drive</a></li>
            <li class="breadcrumb-item active">Upload Client Files</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row align-middle">
                <div class="col-sm-8"><h5 class="m-0">List of Uploaded Files</h5></div>
                <div class="col-sm-4 text-right"><a href="#" data-toggle="modal" data-target="#share" class="btn btn-primary">View Share URL <i class="fas fa-share"></i></a>
                  <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="shareLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="shareLabel">Copy Share Files URL below:</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <textarea class="form-control" name="shareurl" readonly onclick="javascript:copyshare();"><?php echo base_url().'downloadfiles/clientid/'.$durl; ?></textarea>
                              <div class="succmsg"></div>
                              <script>
                              function copyshare(){
                                  $("textarea.form-control").select();
                                  document.execCommand('copy');
                                  return false;
                              }
                              </script>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <div id="fileerrors"></div>
              <table id="alluploads" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>File Name</th>
                    <th>Date / Time Uploaded</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $path    = 'uploads/remote/'.$slug;
                  $map = directory_map($path);
                  if(!empty($map)){
                    foreach($map as $row) {
                      $fpathe='uploads/remote/'.$slug.'/'.$row;
                      $rid=random_string('alnum',4);
                      $dname = explode(".", $row);
                      $ext = end($dname);
                      ?>
                      <tr>
                        <td><?php echo $row; ?></td>
                        <td><?php echo date("F d Y H:i:s",filemtime($fpathe)); ?></td>
                        <td class="text-center">
                          <a href="#" data-toggle="modal" data-target="#rename<?php echo $rid; ?>" class="btn btn-success">Rename <i class="fas fa-edit"></i></a> | <a href="#" class="btn btn-danger" onclick="javascript:deletefile('<?php echo $fpathe; ?>')">Delete <i class="fas fa-trash"></i></a>
                          <div class="modal fade" id="rename<?php echo $rid; ?>" tabindex="-1" role="dialog" aria-labelledby="rename<?php echo $rid; ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="rename<?php echo $rid; ?>Label">Rename File</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form id="<?php echo $rid; ?>" name="renameform">
                                  <div class="modal-body">
                                    <table style="width:100%;">
                                      <tr><th>Name</th></tr>
                                      <tr><td>
                                        <div class="form-group">
                                          <input type="text" class="form-control newfilename" name="newfilename" value="<?php echo $row; ?>">
                                            <small>*Donot remote extension</small>
                                        </div>
                                        <input type="hidden" class="oldfilename" name="oldfilename" value="<?php echo $row; ?>" />
                                        <input type="hidden" class="slug" name="slug" value="<?php echo $slug; ?>" />
                                      </td></tr>
                                    </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" name="renamesubmit" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                  </div>
                              </form>
                              </div>
                            </div>
                          </div>
                          <br/>
                          <?php
                          if($ext=='mp3'){
                            $mid = random_string('alnum', 6);
                            ?>
                            <audio controls preload="none">
                            <source src="<?php echo base_url().'uploads/remote/'.$slug.'/'.$row; ?>" type="audio/mpeg" />
                            </audio>
                            <?php
                          }
                          ?>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Uploaded Files</h5>
              </div>
              <form role="form" method="post" action="" name="uploadsform" id="uploadsform">
                <div class="card-body">
                  <div id="uploadserrors"></div>
                  <div class="form-group">
                    <label for="customFile">Upload Files</label>
                    <div class="custom-file">
                      <input type="hidden" id="userid" name="userid" class="custom-file-input" value="<?php echo $id; ?>">
                      <input type="hidden" id="fslug" name="fslug" class="custom-file-input" value="<?php echo $slug; ?>">
                      <input type="file" name="upload_files" class="custom-file-input" id="upload_files" multiple>
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
