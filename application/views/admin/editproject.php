<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          foreach($user_data as $row) {
          ?>
          <h1 class="m-0 text-dark">Edit <?php echo $row->cname; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/send_remote_link'; ?>">Remote Drive</a></li>
            <li class="breadcrumb-item active">Edit Project</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary card-outline">
            <div class="col-lg-12">
              <?php echo validation_errors(); ?>
            </div>
            <div class="card-header">
              <h5 class="m-0">Edit Project Details</h5>
            </div>
            <form role="form" method="post" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputpname">Project Name</label>
                  <input type="text" id="inputpname" class="form-control" name="pname" value="<?php echo $row->cname; ?>" placeholder="Enter Project Name" required>
                </div>
                <div class="form-group">
                  <label for="inputlSlug">Url Slug</label>
                  <input type="text" id="inputlSlug" class="form-control" name="uslug" value="<?php echo $row->uslug; ?>" placeholder="Enter URL Slug" required>
                </div>
                <div class="form-group">
                  <label for="inputnotes">Notes</label>
                  <textarea id="inputnotes" class="form-control textarea" name="notes" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row->notes; ?></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="edit" value="Update Project Info" />
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
