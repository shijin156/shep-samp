<div class="gray-background talent-page mb-5">
  <div class="container pt-5 pb-5">
    <div class="row pt-4 pb-5">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">List of Uploaded Files</h5>
          </div>
          <div class="card-body table-responsive p-0">
            <table id="fileuploads" class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>File</th>
                  <th>Click to Download</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $path    = 'uploads/remote/'.$slug;
                $map = directory_map($path);
                $i=1;
                foreach($map as $row) {
                  $dname = explode(".", $row);
                  $ext = end($dname);
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                      <?php
                      if($ext=='mp3'){
                        echo '<audio controls preload="none">';
                        echo '<source src="'.base_url().'uploads/remote/'.$slug.'/'.$row.'" type="audio/mpeg" />';
                        echo '</audio>';
                      }
                      else{
                        echo '<strong>'.$row.'</strong>';
                      }
                      ?></td>
                    <td><a href="<?php echo base_url().'uploads/remote/'.$slug.'/'.$row; ?>" download>Download</a></td>
                  </tr>
                  <?php
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
