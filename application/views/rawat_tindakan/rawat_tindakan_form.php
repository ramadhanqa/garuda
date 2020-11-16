<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA RAWAT_TINDAKAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Tgl Tindakan <?php echo form_error('tgl_tindakan') ?></td><td><input type="date" class="form-control" name="tgl_tindakan" id="tgl_tindakan" placeholder="Tgl Tindakan" value="<?php echo $tgl_tindakan; ?>" /></td></tr>
	    <tr><td width='200'>No Rawat <?php echo form_error('no_rawat') ?></td><td><input type="text" class="form-control" name="no_rawat" id="no_rawat" placeholder="No Rawat" value="<?php echo $no_rawat; ?>" /></td></tr>
	    <tr><td width='200'>Kd Tindakan <?php echo form_error('kd_tindakan') ?></td><td><input type="text" class="form-control" name="kd_tindakan" id="kd_tindakan" placeholder="Kd Tindakan" value="<?php echo $kd_tindakan; ?>" /></td></tr>
	    <tr><td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td></tr>
	    <tr><td width='200'>Kd Dokter <?php echo form_error('kd_dokter') ?></td><td><input type="text" class="form-control" name="kd_dokter" id="kd_dokter" placeholder="Kd Dokter" value="<?php echo $kd_dokter; ?>" /></td></tr>
	    <tr><td width='200'>Bagi Hasil Dokter <?php echo form_error('bagi_hasil_dokter') ?></td><td><input type="text" class="form-control" name="bagi_hasil_dokter" id="bagi_hasil_dokter" placeholder="Bagi Hasil Dokter" value="<?php echo $bagi_hasil_dokter; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_tindakan" value="<?php echo $id_tindakan; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('rawat_tindakan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>