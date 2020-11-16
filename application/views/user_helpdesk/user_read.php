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
        <h2 style="margin-top:0px">User Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
	    <tr><td>Keluhan</td><td><?php echo $keluhan; ?></td></tr>
	    <tr><td>Departemen</td><td><?php echo $departemen; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user_helpdesk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>