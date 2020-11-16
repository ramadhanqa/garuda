<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA DOKTER</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nm Dokter <?php echo form_error('nm_dokter') ?></td><td><input type="text" class="form-control" name="nm_dokter" id="nm_dokter" placeholder="Nm Dokter" value="<?php echo $nm_dokter; ?>" /></td></tr>
	    <tr><td width='200'>Jns Kelamin <?php echo form_error('jns_kelamin') ?></td><td><input type="text" class="form-control" name="jns_kelamin" id="jns_kelamin" placeholder="Jns Kelamin" value="<?php echo $jns_kelamin; ?>" /></td></tr>
	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td></tr>
	    <tr><td width='200'>No Telepon <?php echo form_error('no_telepon') ?></td><td><input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="No Telepon" value="<?php echo $no_telepon; ?>" /></td></tr>
	    <tr><td width='200'>Sip <?php echo form_error('sip') ?></td><td><input type="text" class="form-control" name="sip" id="sip" placeholder="Sip" value="<?php echo $sip; ?>" /></td></tr>
	    <tr><td width='200'>Spesialisasi <?php echo form_error('spesialisasi') ?></td><td><input type="text" class="form-control" name="spesialisasi" id="spesialisasi" placeholder="Spesialisasi" value="<?php echo $spesialisasi; ?>" /></td></tr>
	    <tr><td width='200'>Bagi Hasil <?php echo form_error('bagi_hasil') ?></td><td><input type="text" class="form-control" name="bagi_hasil" id="bagi_hasil" placeholder="Bagi Hasil" value="<?php echo $bagi_hasil; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="kd_dokter" value="<?php echo $kd_dokter; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('dokter') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>