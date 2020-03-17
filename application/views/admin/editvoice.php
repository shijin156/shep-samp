<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          foreach($user_data as $row) {
          ?>
          <h1 class="m-0 text-dark">Edit <?php echo $row->fname.' '.$row->lname; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Voice</li>
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
              <h5 class="m-0">Edit Voice Talent Details</h5>
            </div>
            <form role="form" method="post" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputfName">First Name</label>
                  <input type="text" id="inputfName" class="form-control" name="fname" value="<?php echo $row->fname; ?>" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                  <label for="inputlName">Last Name</label>
                  <input type="text" id="inputlName" class="form-control" name="lname" value="<?php echo $row->lname; ?>" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                  <label for="inputlSlug">Url Slug</label>
                  <input type="text" id="inputlSlug" class="form-control" name="slug" value="<?php echo $row->slug; ?>" placeholder="Enter URL Slug" required>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Profile Description</label>
                  <textarea id="inputDescription" class="form-control textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row->description; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Publish</label>
                  <?php
                  $publish = array(
                    '' => 'Select One',
                    '1' => 'Live',
                    '2' => 'Hidden',
                  );
                  echo form_dropdown('publish', $publish, $row->publish, 'class="form-control custom-select"'); ?>
                </div>
                <input type="submit" class="btn btn-primary" name="edit" value="Update Basic Info" />
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h5 class="m-0">Profile Image</h5>
            </div>
            <?php
            if(!empty($profile)) {
              foreach ($profile as $image) {
                echo '<img src="'.base_url().'uploads/profilepics/'.$user_id.'/'.$image->url.'" class="img-thumbnail" style="max-width:285px;"/>';
                echo '<div class="card-body"><div id="profileerrors"></div><a href="#" class="btn btn-danger" onclick="javascript:deleteprofileimage('.$user_id.')">Delete Profile Image <i class="fas fa-trash"></i></a></div>';
                $key =1;
              }
            }
            else {
            ?>
            <form role="form" method="post" action="" id="profilepic_form" name="profilepic_form">
              <div class="card-body">
                <div id="profileerrors"></div>
                <div class="form-group">
                  <label for="customFile">Add Profile Image</label>
                  <small>Recommended Size: 285x350</small>
                  <div class="custom-file">
                    <input type="hidden" id="no_of_pfiles" name="no_of_pfiles" value="<?php if(isset($key)) { echo $key;} else { echo '0'; }?>" />
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
                    <input type="file" name="upload_profilepic" class="custom-file-input" id="upload_profilepic">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <input type="submit" name="SubmitProfilepics" class="d-none" value="Upload Profile Picture" />
                </div>
              </div>
            </form>
          <?php } ?>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h5 class="m-0">Upload Demos</h5>
            </div>
            <form role="form" method="post" action="" name="demosform" id="demosform">
              <div class="card-body">
                <div id="demoserrors"></div>
                <div class="form-group">
                  <label for="customFile">Upload MP3 Demos</label>
                  <div class="custom-file">
                    <?php
                    $totd = 0;
                    foreach($demos as $rows) {
                      $totd = $totd + 1;
                    }
                    ?>
                    <input type="hidden" id="duser_id" name="duser_id" value="<?php echo $user_id; ?>" />
                    <input type="hidden" id="no_of_dfiles" name="no_of_dfiles" value="<?php if($totd > 0) { echo $totd;} else { echo '0'; }?>" />
                    <input type="file" name="upload_demos" class="custom-file-input" id="upload_demos">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div id="sortable">
          <?php
          foreach($demos as $rows) {
            $age = explode(',',$rows->age);
            $vocal = explode(',',$rows->vocal);
            $specs = explode(',',$rows->specs);
          ?>
          <div class="card card-secondary collapsed-card">
            <div class="card-header" <?php if($rows->status==0) echo 'style="background-color:red;"'; else echo 'style="background-color:green;"'; ?>>
              <h3 class="card-title">
                <?php
                if(empty($rows->name)) echo $rows->durl;
                else echo $rows->name;
                if($rows->status==0) echo '  <small>( Hidden on Search )</small>';
                else echo '  <small>( Visible on Search )</small>';
                ?>
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-plus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <audio controls preload="none">
                <source  src="<?php echo base_url().'/uploads/demos/'.$rows->userid.'/'.$rows->durl; ?>" type="audio/mp3">
              </audio>
              <form name="demoinfo" role="form" method="post" id="demono<?php echo $rows->id; ?>" action="">
              <div class="form-group">
                <label for="inputDemoName">Demo Name*</label>
                <input type="text" class="form-control DemoName" name="DemoName" value="<?php echo $rows->name; ?>" placeholder="Enter Demo Name" required>
              </div>
              <div class="form-group">
                <label for="inputCategory">Genre*</label>
                <select name="category" class="form-control custom-select category">
                  <?php
                  $dcat='';
                  if($rows->category==0) {$sel=0; $dcat='selected'; }
                  echo '<option value="0" '.$dcat.' disabled>Select Category</option>';
                  foreach($categories as $crows) {
                    if($crows->id==$rows->category) {
                      $icat = 'selected';
                    }
                    else {
                      $icat ='';
                    }
                    echo '<option value="'.$crows->id.'" '.$icat.'>'.$crows->name.'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
               <label for="language">Foreign Languages</label>
               <select name="language" class="form-control custom-select language">
                 <option value="0" <?php if($rows->lang==0) echo 'selected'; ?>>Select Foreign Language</option>
                 <option value="1" <?php if($rows->lang==1) echo 'selected'; ?>>Spanish</option>
                 <option value="2" <?php if($rows->lang==2) echo 'selected'; ?>>French</option>
                 <option value="3" <?php if($rows->lang==3) echo 'selected'; ?>>German</option>
                 <option value="4" <?php if($rows->lang==4) echo 'selected'; ?>>Italian</option>
                 <option value="5" <?php if($rows->lang==5) echo 'selected'; ?>>Russian</option>
                 <option value="6" <?php if($rows->lang==6) echo 'selected'; ?>>Portuguese</option>
                 <option value="7" <?php if($rows->lang==7) echo 'selected'; ?>>Danish</option>
                 <option value="8" <?php if($rows->lang==8) echo 'selected'; ?>>Dutch</option>
                 <option value="10" <?php if($rows->lang==10) echo 'selected'; ?>>Chinese - Mandarin</option>
                 <option value="9" <?php if($rows->lang==9) echo 'selected'; ?>>Chinese - Cantonese</option>
                 <option value="11" <?php if($rows->lang==11) echo 'selected'; ?>>Japanese</option>
               </select>
             </div>
             <div class="form-group">
               <label for="accent">Foreign Accent</label>
               <select name="accent" class="form-control custom-select accent">
                 <option value="0" <?php if($rows->accent==0) echo 'selected'; ?>>Select Foreign Accent</option>
                 <option value="2" <?php if($rows->accent==2) echo 'selected'; ?>>British</option>
                 <option value="3" <?php if($rows->accent==3) echo 'selected'; ?>>Australian</option>
                 <option value="1" <?php if($rows->accent==1) echo 'selected'; ?>>Spanish</option>
                 <option value="4" <?php if($rows->accent==4) echo 'selected'; ?>>South African</option>
                 <option value="5" <?php if($rows->accent==5) echo 'selected'; ?>>Scottish</option>
                 <option value="7" <?php if($rows->accent==7) echo 'selected'; ?>>Irish</option>
                 <option value="9" <?php if($rows->accent==9) echo 'selected'; ?>>French</option>
                 <option value="10" <?php if($rows->accent==10) echo 'selected'; ?>>German</option>
                 <option value="11" <?php if($rows->accent==11) echo 'selected'; ?>>Italian</option>
                 <option value="12" <?php if($rows->accent==12) echo 'selected'; ?>>Russian</option>
                 <option value="8" <?php if($rows->accent==8) echo 'selected'; ?>>Indian</option>
                 <option value="6" <?php if($rows->accent==6) echo 'selected'; ?>>Middle Eastern</option>
                 <option value="13" <?php if($rows->accent==13) echo 'selected'; ?>>Chinese</option>
                 <option value="14" <?php if($rows->accent==14) echo 'selected'; ?>>Japanese</option>
               </select>
             </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control custom-select gender">
                  <option value="0" <?php if($rows->gender==0) echo 'selected'; ?>>Select Gender</option>
                  <option value="1" <?php if($rows->gender==1) echo 'selected'; ?>>Male</option>
                  <option value="2" <?php if($rows->gender==2) echo 'selected'; ?>>Female</option>
                </select>
              </div>

              <div class="form-group">
                <label for="age">Select Ages Performed</label>
                <div class="form-check">
                  <input class="form-check-input age" name="age" type="checkbox" value="1" <?php if (in_array("1", $age)){echo "checked";} ?>>
                  <label for="age" class="form-check-label">Kids</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input age" name="age" type="checkbox" value="2" <?php if (in_array("2", $age)){echo "checked";} ?>>
                  <label for="age" class="form-check-label">Teen</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input age" name="age" type="checkbox" value="3" <?php if (in_array("3", $age)){echo "checked";} ?>>
                  <label for="age" class="form-check-label">Young Adult</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input age" name="age" type="checkbox" value="4" <?php if (in_array("4", $age)){echo "checked";} ?>>
                  <label for="age" class="form-check-label">Adult</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input age" name="age" type="checkbox" value="5" <?php if (in_array("5", $age)){echo "checked";} ?>>
                  <label for="age" class="form-check-label">Older</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input age" name="age" type="checkbox" value="6" <?php if (in_array("6", $age)){echo "checked";} ?>>
                  <label for="age" class="form-check-label">Senior</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input age" name="age" type="checkbox" value="7" <?php if (in_array("7", $age)){echo "checked";} ?>>
                  <label for="age" class="form-check-label">Kids (Character)</label>
                </div>
              </div>
              <div class="form-group">
                <label for="vocal">Select Vocal Range</label>
                <div class="form-check">
                  <input class="form-check-input vocal" name="vocal" type="checkbox" value="1" <?php if (in_array("1", $vocal)){echo "checked";} ?>>
                  <label for="vocal" class="form-check-label">Deep</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input vocal" name="vocal" type="checkbox" value="2" <?php if (in_array("2", $vocal)){echo "checked";} ?>>
                  <label for="vocal" class="form-check-label">Mid</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input vocal" name="vocal" type="checkbox" value="3" <?php if (in_array("3", $vocal)){echo "checked";} ?>>
                  <label for="vocal" class="form-check-label">Higher</label>
                </div>
              </div>
             <div class="form-group">
               <label for="specs">Select Popular Specs</label>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="1" <?php if (in_array("1", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Raspy / Gravelly</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="2" <?php if (in_array("2", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Millennial</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="3" <?php if (in_array("3", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Young and Conversational</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="4" <?php if (in_array("4", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Deep / Manly / Commanding</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="5" <?php if (in_array("5", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Folksy / Southern Charm</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="6" <?php if (in_array("6", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Business Professional</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="7" <?php if (in_array("7", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Energetic and Fun</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="8" <?php if (in_array("8", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">African American</label>
               </div>
               <div class="form-check">
                 <input class="form-check-input specs" name="specs" type="checkbox" value="9" <?php if (in_array("9", $specs)){echo "checked";} ?>>
                 <label for="specs" class="form-check-label">Featured / Familiar</label>
               </div>
             </div>
              <div class="form-group">
                <label for="status">Publish</label>
                <?php
                $status = array(
                  '0' => 'Hidden on Search',
                  '1' => 'Visible on Search',
                );
                echo form_dropdown('status', $status, $rows->status, 'class="form-control custom-select status"'); ?>
              </div>
              <div clas="form-group">
                <input type="hidden" class="id" name="id" value="<?php echo $rows->id; ?>" />
                <input type="hidden" class="userid" name="userid" value="<?php echo $rows->userid; ?>" />
                <input type="hidden" class="filename" name="filename" value="<?php echo $rows->durl; ?>" />
                <input type="button" name="demoupdate" class="btn btn-block btn-success col-sm-6 demoupdate" value="Update" />
                <input type="button" name="demodelete" class="btn btn-block btn-danger col-sm-6 demodelete" value="Delete" />
              </div>
              </form>
            </div>
          </div>
          <?php
          }
          ?>
          </div>
          <?php
          if(!empty($demos)) {
          ?>
          <div>
          <a href="#" class="btn btn-success" onclick="javascript:updatedemoorder()">Save Demo Order <i class="fas fa-sort"></i></a>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
