<?php
    $this->load->view('admin/template/header2');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pendaftar</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Pendaftar</li>
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
	                                <th>Id Member</th>
	                                <th>Id Lowongan</th>
	                                <th>Tanggal Daftar</th>
	                                <th>Status</th>
	                                <th>Keterangan</th>
	                                <th>CV</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <?php foreach ($pendaftar as $key): ?>
	                        <tbody>
	                            <tr>
	                                <td><?php echo $key->id_member; ?></td>
	                                <td><?php echo $key->id_lowongan; ?></td>
	                                <td><?php echo $key->tanggal_daftar; ?></td>
	                                <td><?php echo $key->status; ?></td>
	                                <td><?php echo $key->keterangan; ?></td>
	                                <td><?php echo $key->cv; ?></td>
	                                <td>
	                                	<a href="admin/update_jenis_perusahaan/<?php echo $key->id_pendaftar ?>" class="btn btn-primary">Edit</a>
										<a href="delete_pendaftar/<?php echo $key->id_pendaftar ?>" class="btn btn-danger">Hapus</a>
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