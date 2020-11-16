<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA RAWAT</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Tgl Rawat <?php echo form_error('tgl_rawat') ?></td><td><input type="date" class="form-control" name="tgl_rawat" id="tgl_rawat" placeholder="Tgl Rawat" value="<?php echo $tgl_rawat; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Rm <?php echo form_error('nomor_rm') ?></td><td><input type="text" class="form-control" name="nomor_rm" id="nomor_rm" placeholder="Nomor Rm" value="<?php echo $nomor_rm; ?>" /></td></tr>
	    <tr><td width='200'>Hasil Diagnosa <?php echo form_error('hasil_diagnosa') ?></td><td><input type="text" class="form-control" name="hasil_diagnosa" id="hasil_diagnosa" placeholder="Hasil Diagnosa" value="<?php echo $hasil_diagnosa; ?>" /></td></tr>
	    <tr><td width='200'>Uang Bayar <?php echo form_error('uang_bayar') ?></td><td><input type="text" class="form-control" name="uang_bayar" id="uang_bayar" placeholder="Uang Bayar" value="<?php echo $uang_bayar; ?>" /></td></tr>
	    <tr><td width='200'>Kd Petugas <?php echo form_error('kd_petugas') ?></td><td><input type="text" class="form-control" name="kd_petugas" id="kd_petugas" placeholder="Kd Petugas" value="<?php echo $kd_petugas; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_rawat" value="<?php echo $no_rawat; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('rawat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>