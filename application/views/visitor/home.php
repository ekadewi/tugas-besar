<?php $this->load->view('visitor/template/header'); ?>
<div id="fh5co-work-section" class="fh5co-light-grey-section">
	<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
		<h2>Perusahaan</h2>
		<p>
			beberapa perusahaan yang terdaftar
		</p>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($perusahaan as $key): ?>
			<div class="col-md-4 animate-box">
				<div class="item-grid text-center">
					<div class="image" style="background-image: url(<?php echo base_url() ?>upload/<?php echo $key->foto; ?>)"></div>
					<div class="v-align">
						<div class="v-align-middle">
							<h3 class="title"><?php echo $key->nama_perusahaan;?></h3>
							<h5 class="category"><?php echo $key->jenis_perusahaan;?></h5>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<div class="container" style="border-bottom: solid 1px #A9A9A9;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<p><a href="<?php echo base_url() ?>visitor/perusahaan">view more</a></p>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<h2>Lowongan</h2>
				<p>Beberapa lowongan yang tersedia, dapatkan pekerjaanmu sekarang juga </p>
			</div>
			<?php foreach ($lowongan as $id): ?>
			<div class="col-md-4 text-center item-block animate-box">
				<h3><?php echo $id->lowongan; ?></h3>
				<p>
					perusahaan : <?php echo $id->nama_perusahaan; ?>
					<br>
					<?php echo $id->deskripsi; ?>
				</p>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<div class="container" style="border-bottom: solid 1px #A9A9A9;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<p><a href="<?php echo base_url() ?>visitor/lowongan">view more</a></p>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('visitor/template/footer'); ?>