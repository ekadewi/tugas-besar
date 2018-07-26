<?php $this->load->view('member/template/header'); ?>
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
			<div class="col-md-12 text-center item-block animate-box table-bordered" style="background: #F0F8FF;">
				<?php echo form_open_multipart('member/detail_lowongan/'.$profile[0]->id_lowongan); ?>
				<br>
				<?php if (isset($error)): ?>
					<p class="text-danger"><?php echo $error ?></p>
				<?php endif ?>
				<h3>Daftarkan dirimu sekarang</h3>
				<?php 
					$terdaftar = false;
					$limit = 0;
					foreach ($pendaftar as $key) {
						if ($key->id_member==$member[0]->id_member && $key->id_lowongan==$profile[0]->id_lowongan) {
							$terdaftar = true;
							$status = $key->status_daftar;
						}
						if ($this->session->userdata('level')==3) {
							if ($key->id_member==$member[0]->id_member && $key->status_daftar=='baru') {
								$limit += 1;
							}					
						}
					}
				?>
				<?php if ($terdaftar): ?>
					<p>
						Anda sudah mendaftar lowongan ini.
						<br>
						<?php
							switch ($status) {
							 	case 'baru':
							 		echo "Silahkan tunggu konfirmasi perusahaan";
							 		break;
							 	
							 	case 'lolos':
							 		echo "Selamat, anda lolos pendaftaran. silahkan hubungi perusahaan untuk lebih lanjut";
							 		break;

							 	case 'tidak lolos':
							 		echo "Maaf, anda belum beruntung";
							 		break;
							 } 
						?>
					</p>
				<?php else: ?>
					<?php if ($limit>=3): ?>
						<p class="text-danger text-center">Maaf, anda tidak boleh mendaftar lebih dari 3 lowongan</p>
					<?php else: ?>
						<p>
							Lampirkan CVmu disini untuk mendaftar (*dalam format pdf) :
							<br>
							<center><input type="file" class="form-control" name="cv" required></center>
						</p>
						<p><input type="submit" name="daftar" value="Daftar" class="btn btn-primary btn-outline"></p>
					<?php endif ?>
				<?php endif ?>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('member/template/footer'); ?>