
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="<?php echo base_url(); ?>asset/bt4/js/jquery-3.3.1.slim.min.js"></script> ตัดออกเพราะชนกันกับ datatable -->
<script src="<?php echo base_url(); ?>asset/bt4/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bt4/js/bootstrap.min.js"></script> 


<!-- ส่วนของ JavaScript ที่ใช้ในการแสดง SweetAlert ตามข้อมูลที่มาจาก session ของ PHP -->
<script type="text/javascript">
  <?php if ($this->session->flashdata('save_success')): ?>
  swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
   <?php endif; ?>
   <?php if ($this->session->flashdata('login_error')): ?>
  swal("", "Username or Password ไม่ถูกต้อง !!", "warning");
   <?php endif; ?>
   <?php if ($this->session->flashdata('logout_success')): ?>
  swal("", "คุณออกจากระบบเรียบร้อยแล้ว", "success");
   <?php endif; ?>
</script>
