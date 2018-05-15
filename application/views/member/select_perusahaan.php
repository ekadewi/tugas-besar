<?php $this->load->view('member/template/header'); ?>
<div id="fh5co-work-section" class="fh5co-light-grey-section">
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
								<a href="<?php echo base_url() ?>member/perusahaan_profile/<?php echo $key->id_perusahaan ?>" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a>
							</div>
						</div>
					</div>
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
<?php $this->load->view('member/template/footer'); ?>