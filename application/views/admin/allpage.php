<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All Pages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">All Pages</li>
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
                <h3 class="card-title">All Pages</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table id="alltalentsd" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Page Name</th>
                      <th>Last Updated</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //array_multisort(array_column($recent, "name"), SORT_ASC, $recent);
                    foreach($page_data as $rows) {
                    ?>
                    <tr>
                      <td><?php echo $rows->name; ?></td>
                      <td><?php echo $rows->date_updated; ?></td>
                      <td><a href="<?php echo base_url('admin/editpage/').$rows->id; ?>">Edit</a></td>
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
