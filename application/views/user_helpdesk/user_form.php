<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA USER</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td></tr>
	    <tr><td width='200'>Telp <?php echo form_error('telp') ?></td><td><input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" /></td></tr>
	    <tr><td width='200'>Keluhan <?php echo form_error('keluhan') ?></td><td><input type="text" class="form-control" name="keluhan" id="keluhan" placeholder="Keluhan" value="<?php echo $keluhan; ?>" /></td></tr>
	    <tr><td width='200'>Departemen <?php echo form_error('departemen') ?></td><td><input type="text" class="form-control" name="departemen" id="departemen" placeholder="Departemen" value="<?php echo $departemen; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('user_helpdesk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>