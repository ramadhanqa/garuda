<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA OBAT</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nm Obat <?php echo form_error('nm_obat') ?></td><td><input type="text" class="form-control" name="nm_obat" id="nm_obat" placeholder="Nm Obat" value="<?php echo $nm_obat; ?>" /></td></tr>
	    <tr><td width='200'>Harga Modal <?php echo form_error('harga_modal') ?></td><td><input type="text" class="form-control" name="harga_modal" id="harga_modal" placeholder="Harga Modal" value="<?php echo $harga_modal; ?>" /></td></tr>
	    <tr><td width='200'>Harga Jual <?php echo form_error('harga_jual') ?></td><td><input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual; ?>" /></td></tr>
	    <tr><td width='200'>Stok <?php echo form_error('stok') ?></td><td><input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" /></td></tr>
	    <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="kd_obat" value="<?php echo $kd_obat; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('obat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>