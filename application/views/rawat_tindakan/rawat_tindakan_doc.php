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
        <h2>Rawat_tindakan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tgl Tindakan</th>
		<th>No Rawat</th>
		<th>Kd Tindakan</th>
		<th>Harga</th>
		<th>Kd Dokter</th>
		<th>Bagi Hasil Dokter</th>
		
            </tr><?php
            foreach ($rawat_tindakan_data as $rawat_tindakan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rawat_tindakan->tgl_tindakan ?></td>
		      <td><?php echo $rawat_tindakan->no_rawat ?></td>
		      <td><?php echo $rawat_tindakan->kd_tindakan ?></td>
		      <td><?php echo $rawat_tindakan->harga ?></td>
		      <td><?php echo $rawat_tindakan->kd_dokter ?></td>
		      <td><?php echo $rawat_tindakan->bagi_hasil_dokter ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>