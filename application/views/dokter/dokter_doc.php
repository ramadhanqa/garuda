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
        <h2>Dokter List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Dokter</th>
		<th>Jns Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>No Telepon</th>
		<th>Sip</th>
		<th>Spesialisasi</th>
		<th>Bagi Hasil</th>
		
            </tr><?php
            foreach ($dokter_data as $dokter)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $dokter->nm_dokter ?></td>
		      <td><?php echo $dokter->jns_kelamin ?></td>
		      <td><?php echo $dokter->tempat_lahir ?></td>
		      <td><?php echo $dokter->tanggal_lahir ?></td>
		      <td><?php echo $dokter->alamat ?></td>
		      <td><?php echo $dokter->no_telepon ?></td>
		      <td><?php echo $dokter->sip ?></td>
		      <td><?php echo $dokter->spesialisasi ?></td>
		      <td><?php echo $dokter->bagi_hasil ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>