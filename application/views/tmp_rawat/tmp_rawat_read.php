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
        <h2 style="margin-top:0px">Tmp_rawat Read</h2>
        <table class="table">
	    <tr><td>Kd Tindakan</td><td><?php echo $kd_tindakan; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Kd Dokter</td><td><?php echo $kd_dokter; ?></td></tr>
	    <tr><td>Bagi Hasil Dokter</td><td><?php echo $bagi_hasil_dokter; ?></td></tr>
	    <tr><td>Kd Petugas</td><td><?php echo $kd_petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tmp_rawat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>