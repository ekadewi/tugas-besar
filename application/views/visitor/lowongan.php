<?php $this->load->view('visitor/template/header'); ?>
<div id="fh5co-services-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<h2>Lowongan</h2>
				<p>Beberapa lowongan yang tersedia, dapatkan pekerjaanmu sekarang juga </p>
			</div>
			<?php foreach ($lowongan as $key): ?>
			<div class="col-md-4 text-center item-block animate-box">
				<h3><?php echo $key->lowongan; ?></h3>
				<p>
					perusahaan : <?php echo $key->nama_perusahaan; ?>
					<br>
					<?php echo $key->deskripsi; ?>
				</p>
				<p><a href="<?php echo base_url() ?>visitor/detail_lowongan/<?php echo $key->id_lowongan; ?>" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a></p>
			</div>
			<?php endforeach ?>
		</div>
		<div class="text-center">
			<?php
				if (isset($links)) {
					echo $links;
				}
			?>
		</div>
	</div>
</div>
<?php $this->load->view('visitor/template/footer'); ?>