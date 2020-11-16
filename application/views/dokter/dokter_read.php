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
        <h2 style="margin-top:0px">Dokter Read</h2>
        <table class="table">
	    <tr><td>Nm Dokter</td><td><?php echo $nm_dokter; ?></td></tr>
	    <tr><td>Jns Kelamin</td><td><?php echo $jns_kelamin; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Telepon</td><td><?php echo $no_telepon; ?></td></tr>
	    <tr><td>Sip</td><td><?php echo $sip; ?></td></tr>
	    <tr><td>Spesialisasi</td><td><?php echo $spesialisasi; ?></td></tr>
	    <tr><td>Bagi Hasil</td><td><?php echo $bagi_hasil; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dokter') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>