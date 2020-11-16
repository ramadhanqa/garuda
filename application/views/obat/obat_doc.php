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
        <h2>Obat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Obat</th>
		<th>Harga Modal</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($obat_data as $obat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $obat->nm_obat ?></td>
		      <td><?php echo $obat->harga_modal ?></td>
		      <td><?php echo $obat->harga_jual ?></td>
		      <td><?php echo $obat->stok ?></td>
		      <td><?php echo $obat->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>