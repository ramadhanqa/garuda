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
        <h2>Pasien List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Pasien</th>
		<th>No Identitas</th>
		<th>Jns Kelamin</th>
		<th>Gol Darah</th>
		<th>Agama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>No Telepon</th>
		<th>Alamat</th>
		<th>Stts Nikah</th>
		<th>Pekerjaan</th>
		<th>Keluarga Status</th>
		<th>Keluarga Nama</th>
		<th>Keluarga Telepon</th>
		<th>Tgl Rekam</th>
		<th>Kd Petugas</th>
		
            </tr><?php
            foreach ($pasien_data as $pasien)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pasien->nm_pasien ?></td>
		      <td><?php echo $pasien->no_identitas ?></td>
		      <td><?php echo $pasien->jns_kelamin ?></td>
		      <td><?php echo $pasien->gol_darah ?></td>
		      <td><?php echo $pasien->agama ?></td>
		      <td><?php echo $pasien->tempat_lahir ?></td>
		      <td><?php echo $pasien->tanggal_lahir ?></td>
		      <td><?php echo $pasien->no_telepon ?></td>
		      <td><?php echo $pasien->alamat ?></td>
		      <td><?php echo $pasien->stts_nikah ?></td>
		      <td><?php echo $pasien->pekerjaan ?></td>
		      <td><?php echo $pasien->keluarga_status ?></td>
		      <td><?php echo $pasien->keluarga_nama ?></td>
		      <td><?php echo $pasien->keluarga_telepon ?></td>
		      <td><?php echo $pasien->tgl_rekam ?></td>
		      <td><?php echo $pasien->kd_petugas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>