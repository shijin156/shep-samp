<div class="gray-background talent-page mb-5">
  <div class="container pt-5 pb-5">
    <div class="row pt-4 pb-5">
      <div class="col-md-12">
        <h5 class="text-center p-4">Project: &nbsp;&nbsp;<?php echo $name; ?></h5>
        <?php
        if(!empty($notes)) {
          echo 'Notes:<br />';
          echo $notes;
          echo '<br/>';
        }
        ?>
        <div class="card card-primary card-outline">
          <div class="card-header form-inline">
            <h5 class="m-0"></h5><a href="#" class="btn btn-primary" onclick="javascript:allselection();return false;">Select All</a> &nbsp;&nbsp; <a href="#" class="btn btn-secondary" onclick="javascript:clearselection();return false;">Clear Selection</a> &nbsp;&nbsp; <a href="#" class="btn btn-success" onclick="javascript:downloadselected();return false;">Download Selected</a>
          </div>
          <div class="card-body table-responsive p-0">
            <table id="fileuploads" class="table table-hover text-nowrap">
              <input type="hidden" name="clientname" id="clientname" value="<?php echo $name; ?>" />
              <thead>
                <tr>
                  <th>Select</th>
                  <th>File Name</th>
                  <th>Date / Time Uploaded</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $path    = 'uploads/remote/'.$slug;
                $map = directory_map($path);
                $i=1;
                if(empty($map)){
                  // echo 'Nothing to Display';
                  show_404();
                }
                else {
                  foreach($map as $row) {
                    $dname = explode(".", $row);
                    $ext = end($dname);
                    $fpathe='uploads/remote/'.$slug.'/'.$row;
                    ?>
                    <tr>
                      <td><input type="checkbox" name="select" class="select" value="<?php echo $fpathe; ?>" /></td>
                      <td><?php echo $row; ?></td>
                      <td><?php echo date("F d Y H:i:s",filemtime($fpathe)); ?></td>
                      <td class="text-center">

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
                        <a href="<?php echo base_url().'uploads/remote/'.$slug.'/'.$row; ?>" class="btn btn-dark" download>Download</a>
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

    </div>
  </div>
</div>
