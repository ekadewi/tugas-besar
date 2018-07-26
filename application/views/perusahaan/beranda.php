<?php $this->load->view('perusahaan/template/header'); ?>
<div id="fh5co-pricing-section">
	<div class="container">
		<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
			<h2>Info Terbaru</h2>
			<p>Informasi tentang Pendaftar di Perusahaan <?php echo $id[0]->nama_perusahaan; ?>. </p>
		</div>
		<div class="row">
			<div class="pricing">
				<div class="col-md-4 animate-box">
					<div class="price-box">
						<h2 class="pricing-plan">Jumlah Pendaftar Yang Lolos</h2>
						<div class="price"><?php echo $pendaftarlolos[0]->jumlah ?></div>
						<br>
						<p>
							<a href="<?php echo base_url('perusahaan/pendaftar/'.$this->session->userdata('id')) ?>" class="btn btn-select-plan btn-sm">Detail</a>
						</p>
					</div>
				</div>

				<div class="col-md-4 animate-box">
					<div class="price-box">
						<h2 class="pricing-plan">Jumlah Pendaftar Yang Tidak Lolos</h2>
						<div class="price"><?php echo $pendaftartidaklolos[0]->jumlah ?></div>
						<br>
						<p>
							<a href="<?php echo base_url('perusahaan/pendaftar/'.$this->session->userdata('id')) ?>" class="btn btn-select-plan btn-sm">Detail</a>
						</p>
					</div>
				</div>

				<div class="col-md-4 animate-box">
					<div class="price-box popular">
						<h2 class="pricing-plan pricing-plan-offer">Jumlah Pendaftar Baru</h2><br>
						<div class="price"><?php echo $pendaftarbaru[0]->jumlah ?></div>
						<br>
						<p>
							<a href="<?php echo base_url('perusahaan/pendaftar/'.$this->session->userdata('id')) ?>" class="btn btn-select-plan btn-sm">Detail</a>
						</p>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<?php $this->load->view('perusahaan/template/footer'); ?>