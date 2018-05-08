<?php
    $this->load->view('admin/template/header');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Jenis Perusahaan</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Jenis Perusahaan</li>
                </ol>
            </div>
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                	<h4 class="text-danger"><?php echo validation_errors(); ?></h4> 
	                	<?php foreach ($detail as $key): ?>
	                   <?php echo form_open('admin/update_jenis_perusahaan/'.$key->id_jenis_perusahaan, array('enctype'=>'multipart/form-data')); ?>
						<table class="table table-responsive">
							<tr>
								<td>Jenis Perusahaan</td>
								<td>:</td>
								<td><input type="text" name="nama" value="<?php echo $key->jenis_perusahaan; ?>" style="width: 500px;"></td>
							</tr>
							<tr class="text-center">
								<td colspan="3"><input type="submit" name="update" value="Edit" class="btn btn-primary"></td>
							</tr>
						</table>
						<?php endforeach ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<?php
	$this->load->view('admin/template/footer');
?>