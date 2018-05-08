<?php $this->load->view('member/template/header'); ?>
<div id="fh5co-pricing-section" style="padding: 5% 0 0 0 !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<img src="<?php echo base_url() ?>upload/<?php echo $biodata[0]->foto_member; ?>" class="img-circle" width="100" height="100">
			</div>
		</div>
		<div class="row">
			<div class="table-responsive">
	        	<h4 class="text text-danger"><?php echo validation_errors(); ?></h4>
	        	<?php echo form_open_multipart('member/update_akun/'.$biodata[0]->id_member);?>
				<table class="table table-responsive">
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="username" class="form-control" style="width: 500px;" value="<?php echo $biodata[0]->username; ?>"></td>
					</tr>
					<tr>
						<td>Password Baru</td>
						<td>:</td>
						<td><input type="password" name="password" class="form-control" style="width: 500px;" value="<?php echo $biodata[0]->password; ?>"></td>
					</tr>
					<tr class="text-center">
						<td colspan="3"><input type="submit" name="update" value="Edit" class="btn btn-primary"></td>
					</tr>
				</table>
        	</div>
		</div>
	</div>
</div>
<?php $this->load->view('member/template/footer'); ?>