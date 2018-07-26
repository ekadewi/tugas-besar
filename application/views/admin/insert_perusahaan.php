<?php
    $this->load->view('admin/template/header');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tambah Perusahaan</h4> </div>
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
	                   <?php echo form_open('admin/insert_perusahaan', array('enctype'=>'multipart/form-data')); ?>
	                   <?php echo validation_errors(); ?>
	                   <?php if (isset($message)) {
	                   	echo $message;
	                   } ?>
						<table class="table table-responsive">
							<tr>
								<td>Nama Perusahaan</td>
								<td>:</td>
								<td><input type="text" name="nama" autofocus="" style="width: 500px;" value="<?php echo set_value('nama'); ?>"></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><input type="text" name="alamat" style="width: 800px;" value="<?php echo set_value('alamat'); ?>"></td>
							</tr>
							<tr>
								<td>No Telp</td>
								<td>:</td>
								<td><input type="text" name="no_telp" style="width: 500px;" value="<?php echo set_value('no_telp'); ?>"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><input type="text" name="email" style="width: 500px;" value="<?php echo set_value('email'); ?>"></td>
							</tr>
							<tr>
								<td>Website</td>
								<td>:</td>
								<td><input type="text" name="website" style="width: 500px;" value="<?php echo set_value('website'); ?>"></td>
							</tr>
							<tr>
								<td>Fax</td>
								<td>:</td>
								<td><input type="text" name="fax" style="width: 500px;" value="<?php echo set_value('fax'); ?>"></td>
							</tr>
							<tr>
								<td>Visi</td>
								<td>:</td>
								<td><textarea name="visi" style="width: 500px; height: 100px;"><?php echo set_value('visi'); ?></textarea></td>
							</tr>
							<tr>
								<td>Misi</td>
								<td>:</td>
								<td><textarea name="misi" style="width: 500px; height: 100px;"><?php echo set_value('misi'); ?></textarea></td>
							</tr>
							<tr>
								<td>Tahun Berdiri</td>
								<td>:</td>
								<td><input type="number" name="tahun_berdiri" id="" min="1900" max="<?php echo date('Y') ?>" value="<?php echo set_value('tahun_berdiri'); ?>"></td>
							</tr>
							<tr>
								<td>Jenis Perusahaan</td>
								<td>:</td>
								<td>
									<select name="id_jenis_perusahaan" id="input" class="" required="required">
                            			<?php foreach ($jenis as $value): ?>
                                		<option value="<?= $value->id_jenis_perusahaan ?>"><?= $value->jenis_perusahaan ?></option>
                            			<?php endforeach ?>
                        			</select>
                    			</td>
                    		</tr>
                    		<tr>
								<td>Username</td>
								<td>:</td>
								<td><input type="text" name="username" style="width: 500px;" value="<?php echo set_value('username'); ?>"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input type="password" name="password" style="width: 500px;" value="<?php echo set_value('password'); ?>"></td>
							</tr>
							<tr>
								<td>Foto</td>
								<td>:</td>
								<td><input type="file" name="foto" value="<?php echo set_value('foto'); ?>"></td>
							</tr>
							<tr class="text-center">
								<td colspan="3"><input type="submit" name="simpan" value="simpan" class="btn btn-primary"></td>
							</tr>
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