<?php $this->load->view('perusahaan/template/header'); ?>
<div class="fh5co-about animate-box">
	<div class="container text-center">
	</div>
	<div class="container-fluid">
		<a href="<?php echo base_url() ?>perusahaan/tambah/<?php echo $perusahaan[0]->id_perusahaan ?>" class="btn btn-primary">Tambah</a>
		<div class="col-md-12 animate-box">
			<table class="table table-bordered" id="myTable">
				<thead>
					<tr>
						<th>Tanggal Post</th>
						<th>Lowongan</th>
						<th>Deskripsi</th>
						<th>Jumlah</th>
						<th>Persyaratan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($lowongan as $key): ?>
					<tr>
						<td><?php echo $key->tanggal_post ?></td>
						<td><?php echo $key->lowongan ?></td>
						<td><?php echo $key->deskripsi ?></td>
						<td><?php echo $key->jumlah ?></td>
						<td><?php echo $key->persyaratan ?></td>
						<td><?php echo $key->status ?></td>
						<td>
							<a href="<?php echo base_url() ?>perusahaan/edit/<?php echo $key->id_lowongan ?>" class="btn btn-success">Edit</a>
							<a href="<?php echo base_url() ?>perusahaan/hapus/<?php echo $key->id_lowongan ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('perusahaan/template/footer'); ?>