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
        <h2 style="margin-top:0px">Pendaftaran Read</h2>
        <table class="table">
	    <tr><td>Nomor Rm</td><td><?php echo $nomor_rm; ?></td></tr>
	    <tr><td>Tgl Daftar</td><td><?php echo $tgl_daftar; ?></td></tr>
	    <tr><td>Tgl Janji</td><td><?php echo $tgl_janji; ?></td></tr>
	    <tr><td>Jam Janji</td><td><?php echo $jam_janji; ?></td></tr>
	    <tr><td>Keluhan</td><td><?php echo $keluhan; ?></td></tr>
	    <tr><td>Kd Tindakan</td><td><?php echo $kd_tindakan; ?></td></tr>
	    <tr><td>Nomor Antri</td><td><?php echo $nomor_antri; ?></td></tr>
	    <tr><td>Kd Petugas</td><td><?php echo $kd_petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>