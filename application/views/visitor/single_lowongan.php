<?php $this->load->view('visitor/template/header'); ?>
<div class="fh5co-about animate-box">
	<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
		<h2><?php echo $profile[0]->lowongan; ?></h2>
		<p>
			Perusahaan <?php echo $profile[0]->nama_perusahaan; ?>
			<br>
			Dibutuhkan sebanyak <?php echo $profile[0]->jumlah; ?> orang
		</p>
	</div>	
</div>
<div id="fh5co-services-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-center item-block animate-box">
				<h3>Deskripsi</h3>
				<p><?php echo $profile[0]->deskripsi; ?></p>
			</div>
			<div class="col-md-6 text-center item-block animate-box">
				<h3>Persyaratan</h3>
				<p><?php echo $profile[0]->persyaratan; ?></p>
			</div>
			<!-- <div class="col-md-12 text-center item-block animate-box table-bordered" style="background: #F0F8FF;">
				<br>
				<h3>Daftarkan dirimu sekarang</h3>
				<p>
					Lampirkan CVmu disini untuk mendaftar :
					<br>
					<center><input type="file" class="" name="" required></center>
				</p>
				<p><button type="submit" name="daftar" class="btn btn-primary btn-outline">Daftar</button></p>
			</div> -->
		</div>
	</div>
</div>
<?php $this->load->view('visitor/template/footer'); ?>