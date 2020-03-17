<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Shareable Clients To users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Remote drive</li>
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
              <h3 class="card-title float-none d-inline-block mr-1">All Projects</h3>
              <a href="createproject" class="btn btn-success d-inline-block">Create a Project</a>
            </div>
            <div class="card-body table-responsive p-0">
              <table id="alltalentsd" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Project Name</th>
                    <th>Folder Slug</th>
                    <th>Project Notes</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($share_user as $rows) {
                    ?>
                    <tr>
                      <td><?php echo $rows->cname; ?></td>
                      <td><?php echo $rows->uslug; ?></td>
                      <td><?php echo $rows->notes; ?></td>
                      <td>
                        <form name="folderoptions" id="<?php echo random_string('alnum', 4); ?>">
                          <input type="hidden" name="slug" class="slug" value="<?php echo $rows->uslug; ?>" />
                          <!--<a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/shareclient/').$rows->id; ?>">Share</a> |-->
                          <a class="btn btn-warning btn-xs" href="<?php echo base_url('admin/uploadclientfiles/').$rows->id; ?>">Upload Files</a> |
                          <a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/editproject/').$rows->id; ?>">Edit Project</a> |
                          <input type="button" name="deletefolder" class="delete btn btn-danger btn-xs" value="Delete" />
                        </form>
                      </td>
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
