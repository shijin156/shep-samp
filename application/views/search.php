<section class="voice_talent_search_display">
<div class="container pb-5">
  <?php
  if(empty($demos)) {
    echo '<div class="row text-center"><div class="col-md-12">No Voice Talents Found</div></div>';
  }
  foreach($demos as $rows) {
  ?>
  <div class="row">
    <div class="col-md-4 ">
      <h2><a target="_blank" href="<?php echo base_url() ?>voice/<?php echo $rows->slug; ?>"><?php echo $rows->vfname.' '.$rows->vlname; ?></a></h2>
    </div>
    <div class="col-md-4 ">
      <h2><?php echo $rows->cname; ?></h2>
    </div>
    <div class="col-md-4 ">
      <?php
      if (($this->agent->is_browser('Safari')) || ($this->agent->is_mobile('iphone'))) {
        $mid = random_string('alnum', 6);
        ?>
        <div id="<?php echo 'modalid-'.$mid; ?>">
          <a class="audioscrolllink" data-toggle="moda" data-target="#<?php echo 'moid-'.$mid; ?>"><span></span><div class="audioscroll"></div></a>
          <input type="hidden" class="audiourl" name="audiourl" value="<?php echo base_url().'uploads/demos/'.$rows->user_id.'/'.$rows->durl; ?>" />
        </div>
        <div class="modal fade" id="<?php echo 'mid-'.$mid; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo 'modaltitle-'.$mid; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="<?php echo 'modaltitle-'.$mid; ?>">Audio Preview</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2 class="p-3"><?php echo $rows->vfname.' '.$rows->vlname; ?> - <?php echo $rows->cname; ?></h2>

              <div class="audiohtml"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      else {
      ?>
      <audio controls preload="none" style="display:none">
        <source  src="<?php echo base_url().'uploads/demos/'.$rows->user_id.'/'.$rows->durl; ?>" type="audio/mp3">
      </audio>
      <?php
      }
     ?>
    </div>
  </div>
  <?php
  }
  ?>
</div>
</section>
