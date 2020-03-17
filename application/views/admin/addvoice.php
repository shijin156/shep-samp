<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add New Voice</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Voice</li>
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
              <h5 class="m-0">Enter Voice Talent Details</h5>
            </div>
            <form role="form" method="post" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputfName">First Name</label>
                  <input type="text" id="inputfName" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                  <label for="inputlName">Last Name</label>
                  <input type="text" id="inputlName" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Profile Description</label>
                  <textarea id="inputDescription" class="form-control textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('description'); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Publish</label>
                  <?php
                  $publish = array(
                    '' => 'Select Status',
                    '1' => 'Live',
                    '2' => 'Hidden',
                  );
                  echo form_dropdown('publish', $publish, set_value('publish'), 'class="form-control custom-select"'); ?>
                </div>
                <input type="submit" class="btn btn-primary" name="add" value="Create Talent and Upload Demos" />
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">

        </div>
      </div>
    </div>
  </div>
</div>
