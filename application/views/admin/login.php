  <!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" >
    <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" />
    <title>Sheppard Login</title>
  </head>
  <body>
    <div class="container pt-5">
      <div class="col-md-4 offset-md-4">
        <img src="<?php echo base_url(); ?>images/Sheppard-Redefining-Voiceover-Branding-Logo.jpg" class="img-fluid" alt="Logo"></a>
        <form method="post" action="">
          <div class="border p-3 mt-5">
            <div class="form-group">
              <label>Enter Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo set_value('username');?>"/>
              <span class="text-danger"><?php echo form_error('username'); ?></span>
            </div>
            <div class="form-group">
              <label>Enter Password</label>
              <input type="password" name="password" class="form-control" />
              <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group text-center">
              <input type="submit" name="submit" value="Submit" class="btn btn-info" />
              <span class="text-danger"><?php echo $error_msg; ?></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  </html>
