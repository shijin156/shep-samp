<section class="parameter-form pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php echo $topverb[0]['description']; ?>
      </div>
    </div>
    <div class="row pt-3">
      <div class="col-md-12">
        <div class="gray-background pt-3">
          <form action="<?php echo base_url() ?>search" method="get" class="search_form" name="search_form" id="search_form">
            <div class="col-md-12">
              <ul class="text-center">
                <li  class="d-flex align-items-center justify-content-center">
                  <input type="radio" class="gender" name="gender" value="1" <?php if($gendera==1) echo 'checked'; if($kids==1) echo 'disabled'; ?>> Male&nbsp;&nbsp;&nbsp;
                  <input type="radio" class="gender" name="gender" value="2" <?php if($gendera==2) echo 'checked'; if($kids==1) echo 'disabled'; ?>> Female&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gender" class="gender" value="0" <?php if($gendera==0) echo 'checked'; if($kids==1) echo 'disabled'; ?>> All
                </li>
              </ul>
            </div>
            <div class="row pl-2 pr-2 pb-3">
              <div class="col-md-4 mb-2">
                <select class="selectpicker form-control category" name="category" <?php if($kids==1) echo 'disabled'; ?>>
                  <option value="0">Genre*</option>
                  <?php
                  foreach($genre as $rows){
                    ?>
                    <option value="<?php echo $rows->id ?>" <?php if($category==$rows->id) echo 'selected'; ?>><?php echo $rows->name ?></option>
                  <?php }
                  ?>
                </select>
              </div>
              <div class="col-md-4 mb-2">
                <select class="selectpicker form-control age" name="age">
                  <option value="0">Age</option>
                  <option value="1" <?php if($age==1) echo 'selected'; ?>>Kids</option>
                  <option value="7" <?php if($age==7) echo 'selected'; ?>>Kids (Character)</option>
                  <option value="2" <?php if($age==2) echo 'selected'; ?>>Teen</option>
                  <option value="3" <?php if($age==3) echo 'selected'; ?>>Young Adult</option>
                  <option value="4" <?php if($age==4) echo 'selected'; ?>>Adult</option>
                  <option value="5" <?php if($age==5) echo 'selected'; ?>>Older</option>
                  <option value="6" <?php if($age==6) echo 'selected'; ?>>Senior</option>
                </select>
              </div>
              <div class="col-md-4 mb-2">
                <select class="selectpicker form-control vocal" name="vocal" <?php if($kids==1) echo 'disabled'; ?>>
                  <option value="0">Vocal Range </option>
                  <option value="1" <?php if($vocal==1) echo 'selected'; ?>>Deep</option>
                  <option value="2" <?php if($vocal==2) echo 'selected'; ?>>Mid</option>
                  <option value="3" <?php if($vocal==3) echo 'selected'; ?>>Higher</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="searchtype" value="allsearch" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container mb-5 ">
    <div class="row pt-4 pb-2">
      <div class="col-md-12">
        <?php echo $botverb[0]['description']; ?>
      </div>
    </div>
    <div class="row text-center ">
      <div class="col-md-4">
        <div class=" gray-background p-4">
          <form action="<?php echo base_url() ?>search" method="get" class="search_popular_specs" name="search_popular_specs" id="popular_specs">
            <ul>
              <li class="d-flex align-items-center justify-content-center">
                <input type="radio" name="gender" class="gender" value="1" <?php if($genders==1) echo 'checked'; ?>> Male&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" class="gender" value="2" <?php if($genders==2) echo 'checked'; ?>> Female&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" class="gender" value="0" <?php if($genders==0) echo 'checked'; ?>> All
              </li>
              <li>
                <select class="selectpicker form-control mt-3 popular" name="popular">
                  <option value="">Popular Specs</option>
                  <option value="1" <?php if($popular=='1') echo 'selected'; ?>>Raspy / Gravelly</option>
                  <option value="2" <?php if($popular=='2') echo 'selected'; ?>>Millennial</option>
                  <option value="3" <?php if($popular=='3') echo 'selected'; ?>>Young and Conversational</option>
                  <option value="4" <?php if($popular=='4') echo 'selected'; ?>>Deep and Commanding</option>
                  <option value="5" <?php if($popular=='5') echo 'selected'; ?>>Folksy / Southern Charm</option>
                  <option value="6" <?php if($popular=='6') echo 'selected'; ?>>Business Professional</option>
                  <option value="7" <?php if($popular=='7') echo 'selected'; ?>>Energetic and Fun</option>
                  <option value="8" <?php if($popular=='8') echo 'selected'; ?>>African American</option>
                  <option value="9" <?php if($popular=='9') echo 'selected'; ?>>Featured / Familiar</option>
                </select>
              </li>
            </ul>
            <input type="hidden" name="searchtype" value="specs" />
          </form>
        </div>
      </div>
      <div class="col-md-4" style="z-index: 2">
        <div class="gray-background p-4">
          <ul>
            <li>Our Roster</li>
            <li>
              <ul id="talent-name" style="margin-top: 16px;padding-right: 0;" class="selectpicker form-control openselectvoice talent_name" name="name">
                <span align="left">Name</span><i style="color: #000;font-size: 24px;margin-right:10px" align="right" class="fa fa-caret-down float-right" aria-hidden="true"></i>
                <div class="talent_names" style="background-color:#fff;">
                  <?php
                  foreach($allvoices as $rows){
                    ?>
                    <li align="left"> <a class="d-block" style="padding: 3px 5px;" href="<?php  echo base_url() ?>voice/<?php echo $rows->slug; ?>"target="_blank"><?php echo $rows->fname.' '.$rows->lname; ?></a></li>
                  <?php }
                  ?>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class=" gray-background p-4">
          <form action="<?php echo base_url() ?>search" method="get" class="search_language_accent" name="search_language_accent" id="search_language_accent">
            <ul>
              <li class="d-flex align-items-center justify-content-center">
                <input type="radio" class="gender" name="gender" value="1" <?php if($genderl==1) echo 'checked'; ?>> Male&nbsp;&nbsp;&nbsp;
                <input type="radio" class="gender" name="gender" value="2" <?php if($genderl==2) echo 'checked'; ?>> Female&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" class="gender" value="0" <?php if($genderl==0) echo 'checked'; ?>> All
              </li>
              <li>
                <select class="selectpicker form-control mt-3 language" name="language">
                  <option value="">Language &amp; Accent</option>
                  <option class="level-0" value="" disabled>Foreign Language</option>
                  <option class="level-1" value="l-1" <?php if($language=='l-1') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Spanish</option>
                  <option class="level-1" value="l-2" <?php if($language=='l-2') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;French</option>
                  <option class="level-1" value="l-3" <?php if($language=='l-3') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;German</option>
                  <option class="level-1" value="l-4" <?php if($language=='l-4') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Italian</option>
                  <option class="level-1" value="l-5" <?php if($language=='l-5') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Russian</option>
                  <option class="level-1" value="l-6" <?php if($language=='l-6') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Portuguese</option>
                  <option class="level-1" value="l-7" <?php if($language=='l-7') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Danish</option>
                  <option class="level-1" value="l-8" <?php if($language=='l-8') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Dutch</option>
                  <option class="level-1" value="l-10" <?php if($language=='l-10') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Chinese – Mandarin</option>
                  <option class="level-1" value="l-9" <?php if($language=='l-9') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Chinese – Cantonese</option>
                  <option class="level-1" value="l-11" <?php if($language=='l-11') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Japanese</option>
                  <option class="level-0" value="" disabled>Foreign Accent</option>
                  <option class="level-1" value="a-2" <?php if($language=='a-2') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;British Accent</option>
                  <option class="level-1" value="a-3" <?php if($language=='a-3') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Australian Accent</option>
                  <option class="level-1" value="a-1" <?php if($language=='a-1') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Spanish Accent</option>
                  <option class="level-1" value="a-4" <?php if($language=='a-4') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;South African Accent</option>
                  <option class="level-1" value="a-5" <?php if($language=='a-5') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Scottish Accent</option>
                  <option class="level-1" value="a-7" <?php if($language=='a-7') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Irish Accent</option>
                  <option class="level-1" value="a-9" <?php if($language=='a-9') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;French Accent</option>
                  <option class="level-1" value="a-10" <?php if($language=='a-10') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;German Accent</option>
                  <option class="level-1" value="a-11" <?php if($language=='a-11') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Italian Accent</option>
                  <option class="level-1" value="a-12" <?php if($language=='a-12') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Russian Accent</option>
                  <option class="level-1" value="a-8" <?php if($language=='a-8') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Indian Accent</option>
                  <option class="level-1" value="a-6" <?php if($language=='a-6') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Middle Eastern Accent</option>
                  <option class="level-1" value="a-13" <?php if($language=='a-13') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Chinese Accent</option>
                  <option class="level-1" value="a-14" <?php if($language=='a-14') echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;Japanese Accent</option>
                </select>
              </li>
            </ul>
            <input type="hidden" name="searchtype" value="lanacc" />
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
