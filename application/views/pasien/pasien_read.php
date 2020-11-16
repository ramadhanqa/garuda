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
        <h2 style="margin-top:0px">Pasien Read</h2>
        <table class="table">
	    <tr><td>Nm Pasien</td><td><?php echo $nm_pasien; ?></td></tr>
	    <tr><td>No Identitas</td><td><?php echo $no_identitas; ?></td></tr>
	    <tr><td>Jns Kelamin</td><td><?php echo $jns_kelamin; ?></td></tr>
	    <tr><td>Gol Darah</td><td><?php echo $gol_darah; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>No Telepon</td><td><?php echo $no_telepon; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Stts Nikah</td><td><?php echo $stts_nikah; ?></td></tr>
	    <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
	    <tr><td>Keluarga Status</td><td><?php echo $keluarga_status; ?></td></tr>
	    <tr><td>Keluarga Nama</td><td><?php echo $keluarga_nama; ?></td></tr>
	    <tr><td>Keluarga Telepon</td><td><?php echo $keluarga_telepon; ?></td></tr>
	    <tr><td>Tgl Rekam</td><td><?php echo $tgl_rekam; ?></td></tr>
	    <tr><td>Kd Petugas</td><td><?php echo $kd_petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pasien') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>