<?php
    $this->load->view('admin/template/header');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tambah Member</h4> </div>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Member</li>
                </ol>
            </div>
        </div>
        
		<div class="row">
	        <div class="col-sm-12">
	            <div class="white-box">
	                <div class="table-responsive">
	                   <?php echo form_open('admin/insert_member', array('enctype'=>'multipart/form-data')); ?>
	                   <?php echo validation_errors(); ?>
						<table class="table table-responsive">
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><input type="text" name="nama" style="width: 500px;" value="<?php echo set_value('nama'); ?>"></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td>
									<input type="radio" value="L" name="jk"/>
			                        <label class="gender">Laki-Laki</label>
			                        <input type="radio" value="P" name="jk"/>
			                        <label class="gender">Perempuan</label>
                    			</td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td>:</td>
								<td><input type="date" name="tanggal_lahir" style="width: 500px;" value="<?php echo set_value('tanggal_lahir'); ?>"></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td>
									<select name="agama" id="inputAgama" class="">
			                            <option value="islam">Islam</option>
			                            <option value="kristen">Kristen</option>
			                            <option value="budha">Budha</option>
			                            <option value="hindu">Hindu</option>
			                        </select>
								</td>
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