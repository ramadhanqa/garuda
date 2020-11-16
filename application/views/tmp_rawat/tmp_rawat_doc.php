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
        <h2>Tmp_rawat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Tindakan</th>
		<th>Harga</th>
		<th>Kd Dokter</th>
		<th>Bagi Hasil Dokter</th>
		<th>Kd Petugas</th>
		
            </tr><?php
            foreach ($tmp_rawat_data as $tmp_rawat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tmp_rawat->kd_tindakan ?></td>
		      <td><?php echo $tmp_rawat->harga ?></td>
		      <td><?php echo $tmp_rawat->kd_dokter ?></td>
		      <td><?php echo $tmp_rawat->bagi_hasil_dokter ?></td>
		      <td><?php echo $tmp_rawat->kd_petugas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>