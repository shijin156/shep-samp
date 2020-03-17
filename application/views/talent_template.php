<div class="gray-background talent-page mb-5">
  <div class="container pt-5 pb-5">
    <div class="row pt-4 pb-5">
      <?php
    //  print_r($profile);
      foreach($profile as $rows) {
        if(empty($rows->url)){
          ?>
          <div class="col-md-6">
            <h1 class="pb-2"><?php echo $rows->fname.' '.$rows->lname; ?></h1>
            <p class="">
            <?php
            echo $rows->description;
            ?>
            </p>
          </div>
          <?php
          $uid=$rows->user_id;
          echo '<div class="col-md-6">';
            if(!empty($demos)) {
              foreach($demos as $demo) {
              ?>
              <div class="audio-section">
            <span class="audio-title"><?php echo $demo->name; ?></span>
              <audio controls>
                  <source src="<?php echo base_url().'uploads/demos/'.$uid.'/'.$demo->durl; ?>" type="audio/mpeg" />
                </audio>
              </div>
              <?php
            }
            }
          echo '</div>';
        }
        else {
        ?>
        <div class="col-md-4">
          <img src="<?php echo base_url().'uploads/profilepics/'.$rows->userid.'/'.$rows->url; ?>" class="img-responsive w-100" />
        </div>
        <div class="col-md-4">
          <h1 class="pb-2"><?php echo $rows->fname.' '.$rows->lname; ?></h1>
          <p class="">
          <?php
          echo $rows->description;
          ?>
          </p>
        </div>
        <?php
        $uid=$rows->user_id;
        echo '<div class="col-md-4" "style="z-index: 0;">';
          if(!empty($demos)) {
            foreach($demos as $demo) {
            ?>
            <div class="audio-section">
          <span class="audio-title"><?php echo $demo->name; ?></span>
            <audio controls preload="none">
                <source src="<?php echo base_url().'uploads/demos/'.$uid.'/'.$demo->durl; ?>" type="audio/mpeg" />
              </audio>
            </div>
            <?php
          }
          }
        echo '</div>';
      }
    }
      ?>
    </div>
  </div>
</div>
