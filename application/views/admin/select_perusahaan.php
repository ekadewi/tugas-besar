<?php
    $this->load->view('admin/template/header');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Perusahaan</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Perusahaan</li>
                </ol>
            </div>
            <a href="insert_jenis_perusahaan" class="btn btn-primary">Tambah</a>
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                    <table class="table" id="myTable">
	                        <thead>
	                            <tr>
	                                <th>Nama</th>
	                                <th>Alamat</th>
	                                <th>Telp</th>
	                                <th>Email</th>
	                                <th>Website</th>
	                                <th>Fax</th>
	                                <th>Visi</th>
	                                <th>Misi</th>
	                                <th>Tahun Berdiri</th>
	                                <th>Foto</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php foreach ($perusahaan as $key): ?>
	                            <tr>
	                                <td><?php echo $key->nama_perusahaan; ?></td>
	                                <td><?php echo $key->alamat; ?></td>
	                                <td><?php echo $key->no_telp; ?></td>
	                                <td><?php echo $key->email; ?></td>
	                                <td><?php echo $key->website; ?></td>
	                                <td><?php echo $key->fax; ?></td>
	                                <td><?php echo $key->visi; ?></td>
	                                <td><?php echo $key->misi; ?></td>
	                                <td><?php echo $key->tahun_berdiri; ?></td>
	                                <td>
	                                	<img src="../upload/<?php echo $key->foto;?>" alt="Image" width="50" height="50">
	                                </td>
	                                <td>
	                                	<a href="admin/update_jenis_perusahaan/<?php echo $key->id_perusahaan ?>" class="btn btn-primary">Edit</a>
										<a href="delete_perusahaan/<?php echo $key->id_perusahaan ?>" class="btn btn-danger">Hapus</a>
									</td>
	                            </tr>
	                        <?php endforeach ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<?php
	$this->load->view('admin/template/footer');
?>