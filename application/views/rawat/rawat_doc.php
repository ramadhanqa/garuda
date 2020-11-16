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
        <h2>Rawat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tgl Rawat</th>
		<th>Nomor Rm</th>
		<th>Hasil Diagnosa</th>
		<th>Uang Bayar</th>
		<th>Kd Petugas</th>
		
            </tr><?php
            foreach ($rawat_data as $rawat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rawat->tgl_rawat ?></td>
		      <td><?php echo $rawat->nomor_rm ?></td>
		      <td><?php echo $rawat->hasil_diagnosa ?></td>
		      <td><?php echo $rawat->uang_bayar ?></td>
		      <td><?php echo $rawat->kd_petugas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>