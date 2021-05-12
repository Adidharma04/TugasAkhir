<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>

  <!-- /.control-sidebar -->
  <footer class="main-footer">
      <strong>Copyright &copy; SMA NEGERI PLOSO <a href="http://www.smanegeriploso.sch.id/">smanegeriploso.sch.id</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> Beta
      </div>
  </footer>

</div>

<script>
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>
