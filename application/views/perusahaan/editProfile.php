<?php $this->load->view('perusahaan/template/header'); ?>
<div id="fh5co-pricing-section" style="padding: 5% 0 0 0 !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<img src="<?php echo base_url() ?>upload/<?php echo $profil[0]->foto; ?>" class="img-circle" width="100" height="100">
			</div>
		</div>
		<div class="row">
			<div class="table-responsive">
	        	<h4 class="text text-danger"><?php echo validation_errors(); ?></h4>
	        	<?php echo form_open_multipart('perusahaan/update/'.$this->session->userdata('id'));?>
				<table class="table table-responsive">
					<tr>
						<td>Nama Perusahaan</td>
						<td>:</td>
						<td><input type="text" name="nama_perusahaan" autofocus="" class="form-control" style="width: 500px;" value="<?php echo set_value('nama_perusahaan', $profil[0]->nama_perusahaan);?>"></td>
					</tr>
					<tr>
						<td>Jenis Perusahaan</td>
						<td>:</td>
						<td>
							<select name="id_jenis_perusahaan" id="input" class="form-control" >
	                            <?php foreach ($jenis_perusahaan as $value): ?>
	                                <option value="<?= $value->id_jenis_perusahaan ?>" <?php if ($value->id_jenis_perusahaan==$profil[0]->id_jenis_perusahaan): ?>
	                                	selected
	                                <?php endif ?>><?= $value->jenis_perusahaan ?></option>
	                            <?php endforeach ?>
	                        </select>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><input type="text" name="alamat" class="form-control" style="width: 800px;" value="<?php echo set_value('alamat', $profil[0]->alamat); ?>"></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td>:</td>
						<td><input type="tel" name="no_telp" class="form-control" style="width: 500px;" value="<?php echo set_value('no_telp', $profil[0]->no_telp); ?>"></td>
					</tr>
					<tr>
						<td>Fax</td>
						<td>:</td>
						<td><input type="tel" name="fax" class="form-control" style="width: 500px;" value="<?php echo set_value('fax', $profil[0]->fax); ?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="text" name="email" class="form-control" style="width: 500px;" value="<?php echo set_value('email', $profil[0]->email); ?>"></td>
					</tr>
					<tr>
						<td>Website</td>
						<td>:</td>
						<td><input type="text" name="website" class="form-control" style="width: 500px;" value="<?php echo set_value('website', $profil[0]->website); ?>"></td>
					</tr>
					<tr>
						<td>Visi</td>
						<td>:</td>
						<td><textarea name="visi" class="form-control" height="200px"><?php echo set_value('visi', $profil[0]->visi); ?></textarea></td>
					</tr>
					<tr>
						<td>Misi</td>
						<td>:</td>
						<td><textarea name="misi" class="form-control" height="200px"><?php echo set_value('misi', $profil[0]->misi); ?></textarea></td>
					</tr>
					<tr>
						<td>Tahun Berdiri</td>
						<td>:</td>
						<td><input type="number" name="tahun_berdiri" class="form-control" min="1900" max="<?php echo date('Y') ?>" value="<?php echo set_value('tahun_berdiri', $profil[0]->tahun_berdiri); ?>"></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>:</td>
						<td><input type="file" name="foto" class="form-control"value="<?php echo set_value('foto'); ?>"></td>
					</tr>
					<tr class="text-center">
						<td colspan="3"><input type="submit" name="update" value="Edit" class="btn btn-primary"></td>
					</tr>
				</table>
        	</div>
		</div>
	</div>
</div>
<?php $this->load->view('perusahaan/template/footer'); ?>