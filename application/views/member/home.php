<?php $this->load->view('member/template/header'); ?>
<div id="fh5co-work-section" class="fh5co-light-grey-section">
	<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
		<h2>Perusahaan Terbaru</h2>
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
							<a href="<?php echo base_url() ?>member/perusahaan_profile/<?php echo $key->fk_user ?>" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<h2>Lowongan Terbaru</h2>
			</div>
			<?php foreach ($lowongan as $key): ?>
			<div class="col-md-4 text-center item-block animate-box">
				<h3><?php echo $key->lowongan; ?></h3>
				<p>
					perusahaan : <?php echo $key->nama_perusahaan; ?>
					<br>
					<?php echo $key->deskripsi; ?>
				</p>
				<p><a href="<?php echo base_url() ?>member/detail_lowongan/<?php echo $key->id_lowongan; ?>" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a></p>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<?php $this->load->view('member/template/footer'); ?>