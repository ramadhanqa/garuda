<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Pendaftaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor Rm</th>
		<th>Tgl Daftar</th>
		<th>Tgl Janji</th>
		<th>Jam Janji</th>
		<th>Keluhan</th>
		<th>Kd Tindakan</th>
		<th>Nomor Antri</th>
		<th>Kd Petugas</th>
		
            </tr><?php
            foreach ($pendaftaran_data as $pendaftaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pendaftaran->nomor_rm ?></td>
		      <td><?php echo $pendaftaran->tgl_daftar ?></td>
		      <td><?php echo $pendaftaran->tgl_janji ?></td>
		      <td><?php echo $pendaftaran->jam_janji ?></td>
		      <td><?php echo $pendaftaran->keluhan ?></td>
		      <td><?php echo $pendaftaran->kd_tindakan ?></td>
		      <td><?php echo $pendaftaran->nomor_antri ?></td>
		      <td><?php echo $pendaftaran->kd_petugas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>