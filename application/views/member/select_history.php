<?php $this->load->view('member/template/header'); ?>
<div class="fh5co-about animate-box">
	<div class="container text-center">
	</div>
	<div class="container-fluid">
		<div class="col-md-12 animate-box">
			<table class="table table-bordered" id="myTable">
				<thead>
					<tr>
						<th>Tanggal Daftar</th>
						<th>Lowongan</th>
						<th>Perusahaan</th>
						<th>CV</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($history as $key): ?>
					<tr>
						<td><?php echo $key->tanggal_daftar ?></td>
						<td><?php echo $key->lowongan ?></td>
						<td><?php echo $key->nama_perusahaan ?></td>
						<td><a href="<?php echo base_url('upload/cv/'.$key->cv) ?>" target="_blank"><?php echo $key->cv ?></a></td>
						<td class="text-info"><?php if (
							$key->status_daftar == 'baru') {
							echo "tunggu konfirmasi";
						} else {
							echo $key->status_daftar;
						} ?>
						</td>
						<td><a href="<?php echo base_url('member/detail_lowongan/'.$key->id_lowongan) ?>" class="btn btn-primary">Detail</a></td>
					</tr>
				<?php endforeach ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('member/template/footer'); ?>