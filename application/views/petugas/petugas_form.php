<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PETUGAS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nm Petugas <?php echo form_error('nm_petugas') ?></td><td><input type="text" class="form-control" name="nm_petugas" id="nm_petugas" placeholder="Nm Petugas" value="<?php echo $nm_petugas; ?>" /></td></tr>
	    <tr><td width='200'>No Telepon <?php echo form_error('no_telepon') ?></td><td><input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="No Telepon" value="<?php echo $no_telepon; ?>" /></td></tr>
	    <tr><td width='200'>Username <?php echo form_error('username') ?></td><td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td></tr>
	    <tr><td width='200'>Password <?php echo form_error('password') ?></td><td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td></tr>
	    <tr><td width='200'>Level <?php echo form_error('level') ?></td><td><input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="kd_petugas" value="<?php echo $kd_petugas; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('petugas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>