<?php $this->load->view('perusahaan/template/header'); ?>
<div class="fh5co-about animate-box">
	<div class="container text-center">
	</div>
	<div class="container">
		<?php echo form_open('perusahaan/pendaftar/'.$this->session->userdata('id'), array('target' => '_blank')); ?>
		Print :
		<select name="pendaftar" id="inputStatus" class="">
			<option value="baru">Pendaftar Baru</option>
			<option value="lolos">Pendaftar Lolos</option>
			<option value="tidak lolos">Pendaftar Tidak Lolos</option>
		</select>
		<input type="submit" name="print" class="btn btn-primary" value="Print">
		<?php echo form_close(); ?>
	</div>
	<div class="container-fluid">
		<div class="col-md-12 animate-box">
			<table class="table table-bordered" id="myTable">
				<thead>
					<tr>
						<th>Tanggal Daftar</th>
						<th>Lowongan</th>
						<th>Nama</th>
						<th>CV</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($pendaftar as $key): ?>
					<tr>
						<td><?php echo $key->tanggal_daftar ?></td>
						<td><?php echo $key->lowongan ?></td>
						<td><?php echo $key->nama_member ?></td>
						<td><a href="<?php echo base_url('upload/cv/'.$key->cv) ?>" target="_blank"><?php echo $key->cv ?></a></td>
						<td><?php echo $key->status_daftar ?></td>
						<td>
							<?php if ($key->status_daftar=='baru'): ?>
								<a href="<?php echo base_url() ?>perusahaan/terima/<?php echo $key->id_pendaftar ?>/<?php echo $key->id_lowongan ?>" class="btn btn-success">Terima</a>
								<a href="<?php echo base_url() ?>perusahaan/tolak/<?php echo $key->id_pendaftar ?>" class="btn btn-danger">Tolak</a>
							<?php else: ?>
								
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('perusahaan/template/footer'); ?>