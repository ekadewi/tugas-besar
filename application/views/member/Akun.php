<?php $this->load->view('member/template/header'); ?>
<div id="fh5co-pricing-section" style="padding: 5% 0 0 0 !important;">
	<div class="container text-center">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<img src="<?php echo base_url() ?>upload/<?php echo $biodata[0]->foto_member; ?>" class="img-circle" width="100" height="100">
			</div>
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<h2><?php echo $biodata[0]->nama_member; ?></h2>
				<p>Username : <?php echo $biodata[0]->username; ?> <br>
				Password : <?php echo $biodata[0]->password; ?></p>
			</div>
		</div>
	<a href="../update_akun/<?php echo $this->session->userdata('id'); ?>" class="btn btn-primary">Edit Akun</a>
	</div>
</div>
<?php $this->load->view('member/template/footer'); ?>