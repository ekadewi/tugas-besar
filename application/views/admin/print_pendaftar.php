<?php
    $this->load->view('admin/template/header');
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
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                    <table class="table" id="myTable">
	                        <thead>
	                            <tr>
	                                <th>Tanggal Daftar</th>
	                                <th>Member</th>
	                                <th>Lowongan</th>
	                                <th>Perusahaan</th>
	                                <th>Status</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php foreach ($pendaftar as $key): ?>
	                            <tr>
	                                <td><?php echo $key->tanggal_daftar; ?></td>
	                                <td><?php echo $key->nama_member; ?></td>
	                                <td><?php echo $key->lowongan; ?></td>
	                                <td><?php echo $key->nama_perusahaan; ?></td>
	                                <td><?php echo $key->status_daftar; ?></td>
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