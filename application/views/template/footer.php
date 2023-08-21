<!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Helpdesk System by devbanban.com 2020</b>
    </div>
   
  </footer> -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div>
</div> -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
</body>
</html>

<!-- เรียกใช้ DataTables เป็นส่วนที่กำหนดการใช้งาน DataTables ในตารางที่มี id="example1" -->
<script>
$(document).ready(function() {
$('#example1').DataTable( {
"aaSorting" :[[0,'desc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );

</script>
<script>
$(function () {
$('#example1').DataTable()
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>

<script type="text/javascript">
  <?php if ($this->session->flashdata('save_success')): ?>
  swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
   <?php endif; ?>

   <?php if ($this->session->flashdata('check_duplicate')): ?>
  swal("", "ข้อมูลซ้ำ!!!", "warning");
   <?php endif; ?>

   <?php if ($this->session->flashdata('wrong_alert')): ?>
  swal("", "เกิดข้อผิดพลาด!!!", "warning");
   <?php endif; ?>

   <?php if ($this->session->flashdata('del_success')): ?>
  swal("", "ลบข้อมูลเรียบร้อยแล้ว", "success");
   <?php endif; ?>
</script>
