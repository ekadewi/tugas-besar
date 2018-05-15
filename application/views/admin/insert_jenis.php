<?php
    $this->load->view('admin/template/header');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Jenis Perusahaan</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Jenis Perusahaan</li>
                </ol>
            </div>
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                   <?php echo form_open_multipart('admin/insert_jenis_perusahaan', array('class'=>'needs-validation', 'novalidate'=>'')); ?>
	                    <h4 class="text-danger"><?php echo validation_errors(); ?></h4> 
	                     <div class="form-group">
	                     	<table class="table table-responsive">
								<tr>
									<td>Jenis Perusahaan</td>
									<td>:</td>
									<td>
										<input type="text" class="form-control" name="jenis_perusahaan" style="width: 500px;" required>
										<div class="invalid-feedback">Isi judulnya</div>
									</td>
								</tr>
								<tr class="text-center">
									<td colspan="3"><input type="submit" name="simpan" value="simpan" class="btn btn-primary"></td>
								</tr>
							</table>
	                     </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
 'use strict';
 window.addEventListener('load', function() {
   // Fetch all the forms we want to apply custom Bootstrap validation styles to
   var forms = document.getElementsByClassName('needs-validation');
   // Loop over them and prevent submission
   var validation = Array.prototype.filter.call(forms, function(form) {
     form.addEventListener('submit', function(event) {
       if (form.checkValidity() === false) {
         event.preventDefault();
         event.stopPropagation();
       }
       form.classList.add('was-validated');
     }, false);
   });
 }, false);
})();
</script>


<?php
	$this->load->view('admin/template/footer');
?>

