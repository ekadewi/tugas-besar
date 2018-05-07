<?php
    $this->load->view('admin/template/header2');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Jenis Perusahaan</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Jenis Perusahaan</li>
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
	                                <th>Jenis Perusahaan</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php foreach ($jenis_perusahaan as $key): ?>
	                            <tr>
	                                <td><?php echo $key->jenis_perusahaan ?></td>
	                                <td>
	                                	<a href="update_jenis_perusahaan/<?php echo $key->id_jenis_perusahaan ?>" class="btn btn-primary">Edit</a>
										<a href="delete_jenis_perusahaan/<?php echo $key->id_jenis_perusahaan ?>" class="btn btn-danger">Hapus</a>
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
	$this->load->view('admin/template/footer2');
?>