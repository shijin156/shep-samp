<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          foreach($page_data as $row) {
          ?>
          <h1 class="m-0 text-dark">Edit <?php echo $row->name; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="col-lg-12">
              <?php echo validation_errors(); ?>
            </div>
            <div class="card-header">
              <h5 class="m-0">Edit Page</h5>
            </div>
            <form role="form" method="post" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Page Name</label>
                  <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $row->name; ?>" placeholder="Enter Page Name" required>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Page Description</label>
                  <textarea id="inputDescription" class="form-control textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row->description; ?></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="edit" value="Update Page Info" />
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
