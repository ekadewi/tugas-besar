<?php
if ($this->session->userdata('level') == 1) {
    redirect('admin');
} else if ($this->session->userdata('level') == 2) {
    redirect('perusahaan');
} else if ($this->session->userdata('level') == 3) {
    redirect('member/profile/'.$this->session->userdata("id"));
} else {
        // redirect('login');
} 
$level = $this->uri->segment(3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Daftar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/default.css"/>
</head>
<body>

    <a href="<?= base_url() ?>login" class="btn btn-danger" style="float: left;">
        Kembali
    </a>
    <?php if ($level == 3): ?>
        <?php echo form_open('login/daftar/'.$level, array('enctype'=>'multipart/form-data', 'class'=>'register')); ?>
        <h1>Registration as Member</h1>
        <?php echo validation_errors(); ?>
        <?php
        if (isset($message)) {
            echo '<h3 class="text-danger">'.$message.'</h3>';
        }
        ?>
        <fieldset class="row1">
            <legend>Account Details</legend>
            <p>
                <label>Username :</label>
                <input type="text" name="username" id="inputUsername" autofocus="" value="<?php echo set_value('username'); ?>">
            </p>
            <p>
                <label>Password :</label>
                <input type="password" name="password" id="inputPassword" value="<?php echo set_value('password'); ?>">
            </p>
            <p>
                <label>Password konfirmasi :</label>
                <input type="password" name="passwordkon" id="" >
            </p>
        </fieldset>
        <fieldset class="row2">
            <legend>Personal Details</legend>
            <p>
                <label>Nama Lengkap :</label>
                <input type="text" name="nama_member" id="inputNama_member" class="long" value="<?php echo set_value('nama_member'); ?>">
            </p>
            <p>
                <label>Agama :</label>
                <select name="agama" id="inputAgama" class="" value="<?php echo set_value('agama'); ?>">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="budha">Budha</option>
                    <option value="hindu">Hindu</option>
                </select>
            </p>
            <p>
                <label>No. Telpon :</label>
                <input type="tel" name="no_telp" id="inputNo_telp" maxlength="12" value="<?php echo set_value('no_telp'); ?>">
            </p>
            <p>
                <label>Email :</label>
                <input type="email" name="email" id="inputEmail" value="<?php echo set_value('email'); ?>">
            </p>
            <p>
                <label>Alamat :</label>
                <textarea name="alamat"><?php echo set_value('alamat'); ?></textarea>
            </p>
        </fieldset>
        <fieldset class="row3">
            <legend>Further Information</legend>
            <p>
                <label>Jenis Kelamin :</label>
                <input type="radio" value="L" name="jenis_kelamin"/>
                <label class="gender">Laki-Laki</label>
                <input type="radio" value="P" name="jenis_kelamin"/>
                <label class="gender">Perempuan</label>
            </p>
            <p>
                <label>Tanggal Lahir :</label>
                <input type="date" name="tanggal_lahir" id="inputTgl_lahir" value="<?php echo set_value('tanggal_lahir'); ?>">
            </p>
            <p>
                <label>Foto :</label>
                <input type="file" name="foto_member" class="long" value="<?php echo set_value('foto_member'); ?>">
            </p>
            <p>
                <label>Type User :</label>
                <input type="radio" name="type_user" value="3"/>
                <label class="gender">Non Premium</label>
                <input type="radio" name="type_user" value="4"/>
                <label class="gender">Premium</label>
            </p>
            <p class="text-center">
                <input type="submit" class="btn btn-success" name="submit" value="Register &raquo;" style="color: #fff; margin: 0 15%">
            </p>
        </fieldset>
        <?php echo form_close(); ?>
        <?php elseif ($level == 2): ?>
            <?php echo form_open('login/daftar/'.$level, array('enctype'=>'multipart/form-data', 'class'=>'register')); ?>
            <h1>Registration as Company</h1>
            <?php echo validation_errors(); ?>
            <?php
            if (isset($message)) {
                echo '<h3 class="text-danger">'.$message.'</h3>';
            }
            ?>
            <div class="container-fluid">
                <fieldset class="row1">
                    <legend>Account Details</legend>
                    <p>
                        <label>Username :</label>
                        <input type="text" name="username" autofocus="" id="inputUsername" value="<?php echo set_value('username'); ?>">
                    </p>
                    <p>
                        <label>Password :</label>
                        <input type="password" name="password" id="inputPassword" value="<?php echo set_value('password'); ?>">
                    </p>
                    <p>
                        <label>Password konfirmasi :</label>
                        <input type="password" name="passwordkon" id="" >
                    </p>
                </fieldset>
                <fieldset class="row2">
                    <legend>Company Details</legend>
                    <p>
                        <label>Nama Perusahaan </label>
                        <input type="text" name="nama_perusahaan" id="inputNama_perusahaan" class="long" value="<?php echo set_value('nama_perusahaan'); ?>">
                    </p>
                    <p>
                        <label>Jenis Perusahaan </label>
                        <select name="id_jenis_perusahaan" id="input" class="" value="<?php echo set_value('id_jenis_perusahaan'); ?>">
                            <?php foreach ($jenis_perusahaan as $value): ?>
                                <option value="<?= $value->id_jenis_perusahaan ?>"><?= $value->jenis_perusahaan ?></option>
                            <?php endforeach ?>
                        </select>
                    </p>
                    <p>
                        <label>No. Telpon :</label>
                        <input type="tel" name="no_telp" id="inputNo_telp" maxlength="12" value="<?php echo set_value('no_telp'); ?>">
                    </p>
                    <p>
                        <label>Fax :</label>
                        <input type="tel" name="fax" id="inputFax" maxlength="12" value="<?php echo set_value('fax'); ?>">
                    </p>
                    <p>
                        <label>Email :</label>
                        <input type="email" name="email" id="inputEmail" value="<?php echo set_value('email'); ?>">
                    </p>
                    <p>
                        <label>Alamat :</label>
                        <textarea name="alamat"><?php echo set_value('alamat'); ?></textarea>
                    </p>
                </fieldset>
                <fieldset class="row3">
                    <legend>Further Information</legend>
                    <p>
                        <label>Website :</label>
                        <input type="text" name="website" id="inputWebsite" class="long" value="<?php echo set_value('website'); ?>">
                    </p>
                    <p>
                        <label>Visi :</label>
                        <input type="text" name="visi" id="inputVisi" class="long" value="<?php echo set_value('visi'); ?>">
                    </p>
                    <p>
                        <label>Misi :</label>
                        <textarea name="misi"><?php echo set_value('misi'); ?></textarea>
                    </p>
                    <p>
                        <label>Tahun Berdiri :</label>
                        <input type="number" name="tahun_berdiri" id="inputThaun" min="1900" max="<?php echo date('Y') ?>" value="<?php echo set_value('tahun_berdiri'); ?>">
                    </p>
                    <p>
                        <label>Foto :</label>
                        <input type="file" name="foto_perusahaan" class="long" value="<?php echo set_value('foto_perusahaan'); ?>">
                    </p>
                    <!-- <div class="infobox"><h4>Helpful Information</h4>
                        <p>Here comes some explaining text, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div> -->
                    <p class="text-center">
                        <input type="submit" class="btn btn-success" name="submit" value="Register &raquo;" style="color: #fff; margin: 0 15%">
                    </p>
                </fieldset>
            </div>
            <?php echo form_close(); ?>
            <?php else : ?>
                <div class="row">
                    <div class="container-fluid">
                        <div class="jumbotron">
                            <div class="container">
                                <h1 class="text-danger">Halaman Tidak Ada</h1>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

        </body>
        <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        </html>





