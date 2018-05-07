<?php $this->load->view('perusahaan/template/header'); ?>
<div class="fh5co-about animate-box">
	<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
		<h2><?php echo $profile[0]->nama_perusahaan; ?></h2>
		<p>
			Perusahaan <?php echo $profile[0]->jenis_perusahaan; ?>
			<br>
			Berdiri sejak <?php echo date('d-m-Y', strtotime($profile[0]->tahun_berdiri)); ?>
		</p>
	</div>	
	<div class="container">
		<div class="col-md-12 animate-box">
			<figure class="text-center">
				<img src="<?php echo base_url() ?>upload/<?php echo $profile[0]->foto; ?>" alt="Free HTML5 Template" class="img-responsive" width="100%">
			</figure>
		</div>
		<div class="col-md-8 col-md-push-4 animate-box">
			<h2>Visi</h2>
			<p><?php echo $profile[0]->visi; ?></p>
		</div>
		<div class="col-md-8 animate-box">
			<h2>Misi</h2>
			<p><?php echo $profile[0]->misi; ?></p>
		</div>
	</div>
</div>
<div id="fh5co-services-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<h2>Alamat</h2>
				<p><?php echo $profile[0]->alamat; ?></p>
			</div>
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<h2>Website</h2>
				<p><?php echo $profile[0]->website; ?></p>
			</div>
			<div class="col-md-4 text-center item-block animate-box">
				<h3>No telp</h3>
				<p><?php echo $profile[0]->no_telp; ?></p>
				<p><a href="#" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a></p>
			</div>
			<div class="col-md-4 text-center item-block animate-box">
				<h3>Fax</h3>
				<p><?php echo $profile[0]->fax; ?></p>
				<p><a href="#" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a></p>
			</div>
			<div class="col-md-4 text-center item-block animate-box">
				<h3>Email</h3>
				<p><?php echo $profile[0]->email; ?></p>
				<p><a href="#" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a></p>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('perusahaan/template/footer'); ?>