<?php
    $this->load->view('admin/template/header');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Member</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Member</li>
                </ol>
            </div>
            <a href="insert_member" class="btn btn-primary">Tambah</a>
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                    <table id="myTable" class="table">
	                        <thead>
	                            <tr>
	                                <th>Nama</th>
	                                <th>JK</th>
	                                <th>Tanggal Lahir</th>
	                                <th>Agama</th>
	                                <th>Alamat</th>
	                                <th>No Telp</th>
	                                <th>Email</th>
	                                <th>Foto</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php foreach ($member as $key): ?>
	                            <tr>
	                                <td><?php echo $key->nama_member ?></td>
	                                <td><?php echo $key->jenis_kelamin ?></td>
	                                <td><?php echo $key->tanggal_lahir ?></td>
	                                <td><?php echo $key->agama ?></td>
	                                <td><?php echo $key->alamat ?></td>
	                                <td><?php echo $key->no_telp ?></td>
	                                <td><?php echo $key->email ?></td>
	                                <td>
	                                	<img src="../upload/<?php echo $key->foto_member;?>" alt="Image" width="50" height="50"></td>
	                                <td>
	                                	<a href="update_member/<?php echo $key->id_member ?>" class="btn btn-primary">Edit</a>
										<a href="delete_member/<?php echo $key->id_member ?>" class="btn btn-danger">Hapus</a>
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