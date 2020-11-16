<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PASIEN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nm Pasien <?php echo form_error('nm_pasien') ?></td><td><input type="text" class="form-control" name="nm_pasien" id="nm_pasien" placeholder="Nm Pasien" value="<?php echo $nm_pasien; ?>" /></td></tr>
	    <tr><td width='200'>No Identitas <?php echo form_error('no_identitas') ?></td><td><input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="No Identitas" value="<?php echo $no_identitas; ?>" /></td></tr>
	    <tr><td width='200'>Jns Kelamin <?php echo form_error('jns_kelamin') ?></td><td><input type="text" class="form-control" name="jns_kelamin" id="jns_kelamin" placeholder="Jns Kelamin" value="<?php echo $jns_kelamin; ?>" /></td></tr>
	    <tr><td width='200'>Gol Darah <?php echo form_error('gol_darah') ?></td><td><input type="text" class="form-control" name="gol_darah" id="gol_darah" placeholder="Gol Darah" value="<?php echo $gol_darah; ?>" /></td></tr>
	    <tr><td width='200'>Agama <?php echo form_error('agama') ?></td><td><input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" /></td></tr>
	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	    <tr><td width='200'>No Telepon <?php echo form_error('no_telepon') ?></td><td><input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="No Telepon" value="<?php echo $no_telepon; ?>" /></td></tr>
	    <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td></tr>
	    <tr><td width='200'>Stts Nikah <?php echo form_error('stts_nikah') ?></td><td><input type="text" class="form-control" name="stts_nikah" id="stts_nikah" placeholder="Stts Nikah" value="<?php echo $stts_nikah; ?>" /></td></tr>
	    <tr><td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" /></td></tr>
	    <tr><td width='200'>Keluarga Status <?php echo form_error('keluarga_status') ?></td><td><input type="text" class="form-control" name="keluarga_status" id="keluarga_status" placeholder="Keluarga Status" value="<?php echo $keluarga_status; ?>" /></td></tr>
	    <tr><td width='200'>Keluarga Nama <?php echo form_error('keluarga_nama') ?></td><td><input type="text" class="form-control" name="keluarga_nama" id="keluarga_nama" placeholder="Keluarga Nama" value="<?php echo $keluarga_nama; ?>" /></td></tr>
	    <tr><td width='200'>Keluarga Telepon <?php echo form_error('keluarga_telepon') ?></td><td><input type="text" class="form-control" name="keluarga_telepon" id="keluarga_telepon" placeholder="Keluarga Telepon" value="<?php echo $keluarga_telepon; ?>" /></td></tr>
	    <tr><td width='200'>Tgl Rekam <?php echo form_error('tgl_rekam') ?></td><td><input type="date" class="form-control" name="tgl_rekam" id="tgl_rekam" placeholder="Tgl Rekam" value="<?php echo $tgl_rekam; ?>" /></td></tr>
	    <tr><td width='200'>Kd Petugas <?php echo form_error('kd_petugas') ?></td><td><input type="text" class="form-control" name="kd_petugas" id="kd_petugas" placeholder="Kd Petugas" value="<?php echo $kd_petugas; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="nomor_rm" value="<?php echo $nomor_rm; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pasien') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>