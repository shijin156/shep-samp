<footer class="gray-background pt-3 pb-3">
  <div class="container text-center">
    <div class="row info-box">
      <div class="col-md-6">
        <a href="mailto:agent@sheppard.agency" target="_blank"><h3>email: agent@sheppard.agency</h3></a>
      </div>
      <div class="col-md-6">
        <a href="tel:+16313329550" target="_blank"><h3>call or text: 631.332.9550</h3></a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row footer-copyright">
      <div class="col-md-12">
        Privacy Policy<br>
        <p class="mb-0">© 2020 Sheppard // Voice Over Site by
          <a href="https://www.voiceactorwebsites.com/" target="_blank"> Voice Actor Websites</a></p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php
  if($this->uri->segment(1) != 'downloadfiles') { ?>
  <script>
  var talent = document.getElementById("talent-name");
  if(talent) {
    document.getElementById("talent-name").onchange = function() {
      if (this.selectedIndex!==0) {
        window.open(this.value, '_blank');
      }
    };
  }
  </script>
  <script>
  var $ = jQuery.noConflict();
  $(document).ready(function(){
    $('form#popular_specs').on('change', function(){
      if(document.getElementById('popular_specs').getElementsByClassName("popular")[0].value) {
        $('form[name="search_popular_specs"]').submit();
      }
      if(((document.getElementById('popular_specs').getElementsByClassName("gender")[0].checked == true) || (document.getElementById('popular_specs').getElementsByClassName("gender")[1].checked ==true))) {
        if(document.getElementById('popular_specs').getElementsByClassName("popular")[0].value) {
          $('form[name="search_popular_specs"]').submit();
        }
      }
    });
    $('form#search_form').on('change', function(){
      var eage = document.getElementById('search_form').getElementsByClassName("age")[0];
      if(eage.value==1){
        document.getElementById('search_form').getElementsByClassName("gender")[0].checked = false;
        document.getElementById('search_form').getElementsByClassName("gender")[0].disabled = true;
        document.getElementById('search_form').getElementsByClassName("gender")[1].checked = false;
        document.getElementById('search_form').getElementsByClassName("gender")[1].disabled = true;
        document.getElementById('search_form').getElementsByClassName("category")[0].value=0;
        document.getElementById('search_form').getElementsByClassName("category")[0].disabled = true;
        document.getElementById('search_form').getElementsByClassName("vocal")[0].value=0;
        document.getElementById('search_form').getElementsByClassName("vocal")[0].disabled = true;
        $('form[name="search_form"]').submit();
      }
      else {
        document.getElementById('search_form').getElementsByClassName("gender")[0].disabled = false;
        document.getElementById('search_form').getElementsByClassName("gender")[1].disabled = false;
        document.getElementById('search_form').getElementsByClassName("category")[0].disabled = false;
        document.getElementById('search_form').getElementsByClassName("vocal")[0].disabled = false;
      }
      if(((document.getElementById('search_form').getElementsByClassName("gender")[0].checked == true) || (document.getElementById('search_form').getElementsByClassName("gender")[1].checked ==true))) {
        if((document.getElementById('search_form').getElementsByClassName("category")[0].value) || (eage.value) || (document.getElementById('search_form').getElementsByClassName("vocal")[0].value)) {
          $('form[name="search_form"]').submit();
        }
      }
      if((document.getElementById('search_form').getElementsByClassName("category")[0].value) || (eage.value) || (document.getElementById('search_form').getElementsByClassName("vocal")[0].value)) {
        if(eage.value==0) {
          if((document.getElementById('search_form').getElementsByClassName("category")[0].value==0) && (document.getElementById('search_form').getElementsByClassName("vocal")[0].value==0)) {
            return;
          }
        }
        $('form[name="search_form"]').submit();
      }
    });
    $('form#search_language_accent').on('change', function(){
      if(document.getElementById('search_language_accent').getElementsByClassName("language")[0].value) {
        $('form[name="search_language_accent"]').submit();
      }
      if(((document.getElementById('search_language_accent').getElementsByClassName("gender")[0].checked == true) || (document.getElementById('search_language_accent').getElementsByClassName("gender")[1].checked ==true))) {
        if(document.getElementById('search_language_accent').getElementsByClassName("language")[0].value) {
          $('form[name="search_language_accent"]').submit();
        }
      }
    });
  });
</script>
<script src="<?php echo base_url().'js/mediaelement-and-player.min.js'; ?>"></script>
<script>
$(document).ready(function(){
  $('audio').mediaelementplayer({
    pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
    shimScriptAccess: 'always'
  });
});
</script>
<script>
var $=jQuery.noConflict();
$(document).ready(function(){
  $( '.talent_names' ).hide();
  $("#talent-name").hover(function () {
    $( '.talent_names' ).toggle();
  });
});</script>
<script type="text/javascript">
(function(w,d,v3){
  w.chaportConfig = {
    appId : '5df0fec7d5aa480ee30b2021'
  };

  if(w.chaport)return;v3=w.chaport={};v3._q=[];v3._l={};v3.q=function(){v3._q.push(arguments)};v3.on=function(e,fn){if(!v3._l[e])v3._l[e]=[];v3._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.com/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
  </script>

  <script>
  $('[id^=modalid]').on('click', function (e) {
    var pid=this.getAttribute('id');
    if(document.getElementById(pid).getElementsByClassName("audiourl")[0] != undefined) {
      var url=document.getElementById(pid).getElementsByClassName("audiourl")[0].value;
      var html='<audio class="audiomejs" preload="none" style="display:none"><source src="' + url + '" type="audio/mp3"></audio>';
      document.getElementById(pid).innerHTML=html;
      var newe= '#' + pid + ' audio';
      $(newe).mediaelementplayer();
      $(newe)[0].play();
    }
  });
  </script>
  <?php
  }
  if($this->uri->segment('1') == 'downloadfiles') {
    ?>
    <script src="<?php echo base_url().'js/mediaelement-and-player.min.js'; ?>"></script>
    <script>
    function allselection() {
      $('input[type=checkbox]').prop('checked',true);
      return false;
    }
    function clearselection() {
      $('input[type=checkbox]').prop('checked',false);
      return false;
    }
    function downloadselected() {
      var sdownloads = [];
      var prese ='';
      form_data = new FormData();
      $.each($("input[name='select']:checked"), function(){
          sdownloads.push($(this).val());
          prese=1;
      });
      if(prese) {
        form_data.append("dfiles", sdownloads.join(","));
        form_data.append("cname", document.getElementById("clientname").value);
        $.ajax({
            url: '../downloadzip/', // point to server-side PHP script
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                //clearselection();
                window.open(response, '_blank');
            },
            error: function (response) {
                console.log(response);
            }
        });
      }
      else {
      }
      return false;
    }
    $(document).ready(function(){
      $('audio').mediaelementplayer({
        pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
        shimScriptAccess: 'always'
      });
      $('[id^=moid]').on('hidden.bs.modal', function (e) {
        $('audio').each(function() {
          $(this)[0].pause();
        });
      });
    });
    </script>
    <script src="<?php echo base_url(); ?>js/admin/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>js/admin/dataTables.bootstrap4.js"></script>
    <script>
    $(function () {
      $('#fileuploads').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "order": [[ 2, "desc" ]],
        "columnDefs": [ {
          'targets': [0,3],
          'orderable': false,
        }]
      });
    })
    </script>
    <?php
  }
  ?>
  </body>
  </html>
