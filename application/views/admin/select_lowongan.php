<?php
    $this->load->view('admin/template/header');
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
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                    <table class="table" id="myTable">
	                        <thead>
	                            <tr>
	                                <th>Tanggal Post</th>
	                                <th>Lowongan</th>
	                                <th>Deskripsi</th>
	                                <th>Persyaratan</th>
	                                <th>Perusahaan</th>
	                                <th>Status</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php foreach ($lowongan as $key): ?>
	                            <tr>
	                                <td><?php echo $key->tanggal_post; ?></td>
	                                <td><?php echo $key->lowongan; ?></td>
	                                <td><?php echo $key->deskripsi; ?></td>
	                                <td><?php echo $key->persyaratan; ?></td>
	                                <td><?php echo $key->nama_perusahaan; ?></td>
	                                <td><?php echo $key->status; ?></td>
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