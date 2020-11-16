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
        <h2 style="margin-top:0px">Obat Read</h2>
        <table class="table">
	    <tr><td>Nm Obat</td><td><?php echo $nm_obat; ?></td></tr>
	    <tr><td>Harga Modal</td><td><?php echo $harga_modal; ?></td></tr>
	    <tr><td>Harga Jual</td><td><?php echo $harga_jual; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('obat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>