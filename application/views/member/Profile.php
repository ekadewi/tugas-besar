<?php $this->load->view('member/template/header'); ?>
<div id="fh5co-pricing-section" style="padding: 5% 0 0 0 !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<img src="<?php echo base_url() ?>upload/<?php echo $biodata[0]->foto_member; ?>" class="img-circle" width="100" height="100">
			</div>
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<h2><?php echo $biodata[0]->nama_member; ?></h2>
				<p>Jenis Kelamin : <?php echo $biodata[0]->jenis_kelamin; ?></p>
			</div>
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<a href="../update/<?php echo $this->session->userdata('id'); ?>" class="btn btn-primary">Edit Profile</a>
			</div>
		</div>
	</div>
</div>
<div id="fh5co-services-section" class="fh5co-light-grey-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 animate-box">
					<div class="services">
						<i class="icon-laptop"></i>
						<div class="desc">
							<h3>Tanggal Lahir</h3>
							<p><?php echo $biodata[0]->tanggal_lahir; ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="services">
						<i class="icon-server"></i>
						<div class="desc">
							<h3>Agama</h3>
							<p><?php echo $biodata[0]->agama; ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="services">
						<i class="icon-money"></i>
						<div class="desc">
							<h3>Alamat</h3>
							<p><?php echo $biodata[0]->alamat; ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="services">
						<i class="icon-tablet"></i>
						<div class="desc">
							<h3>No Telp</h3>
							<p><?php echo $biodata[0]->no_telp; ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="services">
						<i class="icon-line-chart"></i>
						<div class="desc">
							<h3>Email</h3>
							<p><?php echo $biodata[0]->email; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('member/template/footer'); ?>