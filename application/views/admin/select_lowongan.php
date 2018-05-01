<?php
    $this->load->view('admin/template/header2');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Lowongan</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Lowongan</li>
                </ol>
            </div>
            <a href="insert_jenis_perusahaan" class="btn btn-primary">Tambah</a>
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                    <table class="table">
	                        <thead>
	                            <tr>
	                                <th>Lowongan</th>
	                                <th>Deskripsi</th>
	                                <th>Persyaratan</th>
	                                <th>Id Perusahaan</th>
	                                <th>Tanggal Post</th>
	                                <th>Status</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <?php foreach ($lowongan as $key): ?>
	                        <tbody>
	                            <tr>
	                                <td><?php echo $key->lowongan; ?></td>
	                                <td><?php echo $key->deskripsi; ?></td>
	                                <td><?php echo $key->persyaratan; ?></td>
	                                <td><?php echo $key->id_perusahaan; ?></td>
	                                <td><?php echo $key->tanggal_post; ?></td>
	                                <td><?php echo $key->status; ?></td>
	                                <td>
	                                	<a href="admin/update_jenis_perusahaan/<?php echo $key->id_lowongan ?>" class="btn btn-primary">Edit</a>
										<a href="delete_lowongan/<?php echo $key->id_lowongan ?>" class="btn btn-danger">Hapus</a>
									</td>
	                            </tr>
	                        </tbody>
	                        <?php endforeach ?>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<?php
	$this->load->view('admin/template/footer2');
?>