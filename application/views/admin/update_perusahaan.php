<?php
    $this->load->view('admin/template/header');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Perusahaan</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Perusahaan</li>
                </ol>
            </div>
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                	<h4 class="text-danger"><?php echo validation_errors(); ?></h4> 
	                	<?php foreach ($detail as $key): ?>
	                   <?php echo form_open('admin/update_perusahaan/'.$key->id_perusahaan, array('enctype'=>'multipart/form-data')); ?>
						<table class="table table-responsive">
							<tr>
								<td>Nama Perusahaan</td>
								<td>:</td>
								<td><input type="text" name="nama_perusahaan" autofocus="" class="form-control" style="width: 500px;" value="<?php echo set_value('nama_perusahaan', $detail[0]->nama_perusahaan); ?>"></td>
							</tr>
							<tr>
								<td>Jenis Perusahaan</td>
								<td>:</td>
								<td>
									<select name="id_jenis_perusahaan" id="input" class="form-control" >
			                            <?php foreach ($jenis_perusahaan as $value): ?>
			                                <option value="<?= $value->id_jenis_perusahaan ?>" <?php if ($value->id_jenis_perusahaan==$detail[0]->id_jenis_perusahaan): ?>
			                                	selected
			                                <?php endif ?>><?= $value->jenis_perusahaan ?></option>
			                            <?php endforeach ?>
			                        </select>
								</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><input type="text" name="alamat" class="form-control" style="width: 800px;" value="<?php echo set_value('alamat', $detail[0]->alamat); ?>"></td>
							</tr>
							<tr>
								<td>No Telp</td>
								<td>:</td>
								<td><input type="tel" name="no_telp" class="form-control" style="width: 500px;" value="<?php echo set_value('no_telp', $detail[0]->no_telp); ?>"></td>
							</tr>
							<tr>
								<td>Fax</td>
								<td>:</td>
								<td><input type="tel" name="fax" class="form-control" style="width: 500px;" value="<?php echo set_value('fax', $detail[0]->fax); ?>"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><input type="text" name="email" class="form-control" style="width: 500px;" value="<?php echo set_value('email', $detail[0]->email); ?>"></td>
							</tr>
							<tr>
								<td>Website</td>
								<td>:</td>
								<td><input type="text" name="website" class="form-control" style="width: 500px;" value="<?php echo set_value('website', $detail[0]->website); ?>"></td>
							</tr>
							<tr>
								<td>Visi</td>
								<td>:</td>
								<td><textarea name="visi" class="form-control" height="200px"><?php echo set_value('visi', $detail[0]->visi); ?></textarea></td>
							</tr>
							<tr>
								<td>Misi</td>
								<td>:</td>
								<td><textarea name="misi" class="form-control" height="200px"><?php echo set_value('misi', $detail[0]->misi); ?></textarea></td>
							</tr>
							<tr>
								<td>Tahun Berdiri</td>
								<td>:</td>
								<td><input type="number" name="tahun_berdiri" class="form-control" min="1900" max="<?php echo date('Y') ?>" value="<?php echo set_value('tahun_berdiri', $detail[0]->tahun_berdiri); ?>"></td>
							</tr>
							<tr>
								<td>Username</td>
								<td>:</td>
								<td><input type="text" name="username" class="form-control" style="width: 500px;" value="<?php echo set_value('username', $detail[0]->username); ?>"></td>
							</tr>
							<!-- <tr>
								<td>Password</td>
								<td>:</td>
								<td><input type="password" name="password" class="form-control" style="width: 500px;" value="<?php echo $detail[0]->password; ?>"></td>
							</tr> -->
							<tr>
								<td>Foto</td>
								<td>:</td>
								<td><input type="file" name="foto" class="form-control"value="<?php echo set_value('foto'); ?>"></td>
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