<?php $this->load->view('member/template/header'); ?>
<div id="fh5co-pricing-section" style="padding: 5% 0 0 0 !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
				<img src="<?php echo base_url() ?>upload/<?php echo $biodata[0]->foto_member; ?>" class="img-circle" width="100" height="100">
			</div>
		</div>
		<div class="row">
			<div class="table-responsive">
	        	<h4 class="text text-danger"><?php echo validation_errors(); ?></h4>
	        	<?php echo form_open_multipart('member/update/'.$biodata[0]->fk_user);?>
				<table class="table table-responsive">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" autofocus="" name="nama" class="form-control" style="width: 500px;" value="<?php echo set_value('nama', $biodata[0]->nama_member); ?>"></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<input type="radio" value="L" name="jk"  <?php if ($biodata[0]->jenis_kelamin=='L') {
								echo "checked";
							} ?> />
	                        <label class="gender">Laki-Laki</label>
	                        <input type="radio" value="P" name="jk"  <?php if ($biodata[0]->jenis_kelamin=='P') {
								echo "checked";
							} ?> />
	                        <label class="gender">Perempuan</label>
						</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><input type="date" name="tanggal_lahir" class="form-control" style="width: 500px;" value="<?php echo set_value('tanggal_lahir', $biodata[0]->tanggal_lahir); ?>"></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<select name="agama" id="inputAgama" class="form-control">
								<option value="islam" <?php if ($biodata[0]->agama=='islam'){ echo "selected"; } ?>>Islam</option>
		                        <option value="kristen" <?php if ($biodata[0]->agama=='kristen'){ echo "selected"; } ?>>Kristen</option>
		                        <option value="budha" <?php if ($biodata[0]->agama=='budha'){ echo "selected"; } ?>>Budha</option>
		                        <option value="hindu" <?php if ($biodata[0]->agama=='hindu'){ echo "selected"; } ?>>Hindu</option>
		                    </select>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><input type="text" name="alamat" class="form-control" style="width: 800px;" value="<?php echo set_value('alamat', $biodata[0]->alamat); ?>"></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td>:</td>
						<td><input type="text" name="no_telp" class="form-control" style="width: 500px;" value="<?php echo set_value('no_telp', $biodata[0]->no_telp); ?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="text" name="email" class="form-control" style="width: 500px;" value="<?php echo set_value('email', $biodata[0]->email); ?>"></td>
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
<?php $this->load->view('member/template/footer'); ?>