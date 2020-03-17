<footer class="main-footer">
  <div class="float-right d-none d-sm-inline">
    Admin Dashboard
  </div>
  <p class="mb-0">© 2019 Sheppard // Voice Over Site by
    <a href="https://www.voiceactorwebsites.com/" target="_blank"> Voice Actor Websites</a></p>
  </footer>
</div>
<script src="<?php echo base_url(); ?>js/admin/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/admin/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>js/admin/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>js/admin/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>js/admin/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>js/admin/summernote-bs4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
$(function () {
  $('.textarea').summernote();
  $('#alltalentsd').DataTable({
    "paging": false,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,,
    "order": [[ 0, "desc" ]],
    "columnDefs": [ {
      'targets': [1,2],
      'orderable': false,
    }]
  });
  $('#alluploads').DataTable({
    "paging": false,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "order": [[ 1, "desc" ]],
    "columnDefs": [ {
      'targets': [2],
      'orderable': false,
    }]
  });
})
</script>
<script>
$( function() {
  $( "#sortable" ).sortable();
  $( "#sortable" ).disableSelection();
} );
</script>

</body>
</html>
