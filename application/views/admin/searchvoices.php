<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Search Voices</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Search Voices</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Results</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table id="alltalentsd" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(empty($search)) {
                    echo '<tr><td>No Voices Found! Try changing search term.</td></tr>';
                  }
                  foreach($search as $rows) {
                  ?>
                  <tr>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php if($rows->publish == 1) { echo 'Live';}else {echo 'Hidden';} ?></td>
                    <td><a href="<?php echo base_url('admin/editvoice/').$rows->user_id; ?>">Edit</a></td>
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
