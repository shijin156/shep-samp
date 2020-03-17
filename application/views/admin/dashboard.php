<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Talents</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table id="alltalentsd" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //array_multisort(array_column($recent, "name"), SORT_ASC, $recent);
                    foreach($recent as $rows) {
                    ?>
                    <tr>
                      <td><?php echo $rows->fname.' '.$rows->lname; ?></td>
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
