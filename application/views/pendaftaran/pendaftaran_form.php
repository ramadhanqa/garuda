<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PENDAFTARAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nomor Rm <?php echo form_error('nomor_rm') ?></td><td><input type="text" class="form-control" name="nomor_rm" id="nomor_rm" placeholder="Nomor Rm" value="<?php echo $nomor_rm; ?>" /></td></tr>
	    <tr><td width='200'>Tgl Daftar <?php echo form_error('tgl_daftar') ?></td><td><input type="date" class="form-control" name="tgl_daftar" id="tgl_daftar" placeholder="Tgl Daftar" value="<?php echo $tgl_daftar; ?>" /></td></tr>
	    <tr><td width='200'>Tgl Janji <?php echo form_error('tgl_janji') ?></td><td><input type="date" class="form-control" name="tgl_janji" id="tgl_janji" placeholder="Tgl Janji" value="<?php echo $tgl_janji; ?>" /></td></tr>
	    <tr><td width='200'>Jam Janji <?php echo form_error('jam_janji') ?></td><td><input type="text" class="form-control" name="jam_janji" id="jam_janji" placeholder="Jam Janji" value="<?php echo $jam_janji; ?>" /></td></tr>
	    <tr><td width='200'>Keluhan <?php echo form_error('keluhan') ?></td><td><input type="text" class="form-control" name="keluhan" id="keluhan" placeholder="Keluhan" value="<?php echo $keluhan; ?>" /></td></tr>
	    <tr><td width='200'>Kd Tindakan <?php echo form_error('kd_tindakan') ?></td><td><input type="text" class="form-control" name="kd_tindakan" id="kd_tindakan" placeholder="Kd Tindakan" value="<?php echo $kd_tindakan; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Antri <?php echo form_error('nomor_antri') ?></td><td><input type="text" class="form-control" name="nomor_antri" id="nomor_antri" placeholder="Nomor Antri" value="<?php echo $nomor_antri; ?>" /></td></tr>
	    <tr><td width='200'>Kd Petugas <?php echo form_error('kd_petugas') ?></td><td><input type="text" class="form-control" name="kd_petugas" id="kd_petugas" placeholder="Kd Petugas" value="<?php echo $kd_petugas; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_daftar" value="<?php echo $no_daftar; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>