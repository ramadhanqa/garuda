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
        <h2>Penjualan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tgl Penjualan</th>
		<th>Pelanggan</th>
		<th>Keterangan</th>
		<th>Uang Bayar</th>
		<th>Kd Petugas</th>
		
            </tr><?php
            foreach ($penjualan_data as $penjualan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penjualan->tgl_penjualan ?></td>
		      <td><?php echo $penjualan->pelanggan ?></td>
		      <td><?php echo $penjualan->keterangan ?></td>
		      <td><?php echo $penjualan->uang_bayar ?></td>
		      <td><?php echo $penjualan->kd_petugas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>