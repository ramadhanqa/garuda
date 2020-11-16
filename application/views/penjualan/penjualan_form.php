<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PENJUALAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Tgl Penjualan <?php echo form_error('tgl_penjualan') ?></td><td><input type="date" class="form-control" name="tgl_penjualan" id="tgl_penjualan" placeholder="Tgl Penjualan" value="<?php echo $tgl_penjualan; ?>" /></td></tr>
	    <tr><td width='200'>Pelanggan <?php echo form_error('pelanggan') ?></td><td><input type="text" class="form-control" name="pelanggan" id="pelanggan" placeholder="Pelanggan" value="<?php echo $pelanggan; ?>" /></td></tr>
	    <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td></tr>
	    <tr><td width='200'>Uang Bayar <?php echo form_error('uang_bayar') ?></td><td><input type="text" class="form-control" name="uang_bayar" id="uang_bayar" placeholder="Uang Bayar" value="<?php echo $uang_bayar; ?>" /></td></tr>
	    <tr><td width='200'>Kd Petugas <?php echo form_error('kd_petugas') ?></td><td><input type="text" class="form-control" name="kd_petugas" id="kd_petugas" placeholder="Kd Petugas" value="<?php echo $kd_petugas; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_penjualan" value="<?php echo $no_penjualan; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('penjualan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>