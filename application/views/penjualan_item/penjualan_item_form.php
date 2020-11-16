<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PENJUALAN_ITEM</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>No Penjualan <?php echo form_error('no_penjualan') ?></td><td><input type="text" class="form-control" name="no_penjualan" id="no_penjualan" placeholder="No Penjualan" value="<?php echo $no_penjualan; ?>" /></td></tr>
	    <tr><td width='200'>Kd Obat <?php echo form_error('kd_obat') ?></td><td><input type="text" class="form-control" name="kd_obat" id="kd_obat" placeholder="Kd Obat" value="<?php echo $kd_obat; ?>" /></td></tr>
	    <tr><td width='200'>Harga Modal <?php echo form_error('harga_modal') ?></td><td><input type="text" class="form-control" name="harga_modal" id="harga_modal" placeholder="Harga Modal" value="<?php echo $harga_modal; ?>" /></td></tr>
	    <tr><td width='200'>Harga Jual <?php echo form_error('harga_jual') ?></td><td><input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('penjualan_item') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>