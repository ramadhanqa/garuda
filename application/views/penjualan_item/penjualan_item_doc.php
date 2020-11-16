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
        <h2>Penjualan_item List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Penjualan</th>
		<th>Kd Obat</th>
		<th>Harga Modal</th>
		<th>Harga Jual</th>
		<th>Jumlah</th>
		
            </tr><?php
            foreach ($penjualan_item_data as $penjualan_item)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penjualan_item->no_penjualan ?></td>
		      <td><?php echo $penjualan_item->kd_obat ?></td>
		      <td><?php echo $penjualan_item->harga_modal ?></td>
		      <td><?php echo $penjualan_item->harga_jual ?></td>
		      <td><?php echo $penjualan_item->jumlah ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>