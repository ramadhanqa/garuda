<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Petugas Read</h2>
        <table class="table">
	    <tr><td>Nm Petugas</td><td><?php echo $nm_petugas; ?></td></tr>
	    <tr><td>No Telepon</td><td><?php echo $no_telepon; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('petugas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>