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
        <h2 style="margin-top:0px">Tmp_penjualan Read</h2>
        <table class="table">
	    <tr><td>Kd Obat</td><td><?php echo $kd_obat; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Kd Petugas</td><td><?php echo $kd_petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tmp_penjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>