<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          if($msg) {
            echo $msg;
          }
          foreach($user_data as $row) {
            $name=$row->cname;
            $slug=$row->uslug;
            $id=$row->id;
          } ?>
          <h1 class="m-0 text-dark">Share Files of <?php echo $name; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Share Client Files</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0"></h5>
            </div>
            <form role="form" method="post" action="" name="shareform" id="shareform">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputSubject">Enter Email Subject</label>
                  <input type="text" id="inputSubject" class="form-control" name="subject" value="" placeholder="Enter Email Subject" required>
                </div>
                <div class="form-group">
                  <label for="inputEmail">Enter Email to Share Files</label>
                  <input type="email" id="inputEmail" class="form-control" name="email" value="" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submit" value="Share Files" />
                </div>
            </div>
            </form>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">List of Emails Files Shared to:</h5>
            </div>
            <div class="card-body table-responsive p-0">
              <table id="alltalentsd" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Shared URL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(empty($emailssent)) {
                    echo '<div class="col-md-12">No Emails Sent</div>';
                  }
                  foreach($emailssent as $rows) {
                    ?>
                    <tr>
                      <td><?php echo $rows->email; ?></td>
                      <td><?php echo $rows->date_created; ?></td>
                      <td><a href="<?php echo base_url().'downloadfiles/clientid/'.$id.'/'.$rows->act_id; ?>" target="_blank">Click to View</a></td>
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
</div>
