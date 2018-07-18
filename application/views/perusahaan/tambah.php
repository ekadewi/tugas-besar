<?php $this->load->view('perusahaan/template/header'); ?>
<div class="fh5co-about animate-box">
	<h3 class="text-center">Tambah Lowongan</h3>
	<div class="container">
		<div class="col-md-12 animate-box">
			<?php echo form_open('perusahaan/tambah/'.$id_perusahaan); ?>
			<h4 class="text-danger"><?php echo validation_errors(); ?></h4> 
			<table class="table">
				<tr>
					<td>Lowongan</td>
					<td>:</td>
					<td>
						<input type="text" name="lowongan" id="inputLowongan" class="form-control" required="required" value="<?php echo set_value('lowongan'); ?>">
					</td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>:</td>
					<td>
						<textarea name="deskripsi" class="form-control"><?php echo set_value('deskripsi'); ?></textarea>
					</td>
				</tr>
				<tr>
					<td>Persyaratan</td>
					<td>:</td>
					<td>
						<textarea name="persyaratan" class="form-control"><?php echo set_value('persyaratan'); ?></textarea>
					</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td>
						<input type="text" name="jumlah" id="inputJumlah" class="form-control" required="required" value="<?php echo set_value('jumlah'); ?>">
					</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</td>
				</tr>
			</table>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php $this->load->view('perusahaan/template/footer'); ?>