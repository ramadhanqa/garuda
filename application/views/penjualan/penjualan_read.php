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
        <h2 style="margin-top:0px">Penjualan Read</h2>
        <table class="table">
	    <tr><td>Tgl Penjualan</td><td><?php echo $tgl_penjualan; ?></td></tr>
	    <tr><td>Pelanggan</td><td><?php echo $pelanggan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Uang Bayar</td><td><?php echo $uang_bayar; ?></td></tr>
	    <tr><td>Kd Petugas</td><td><?php echo $kd_petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>