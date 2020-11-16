### HELP DESK APP
Nama : Ramadhan Qoridhatul Alfarizi <br>
NIM : 180441100098 <br>
IPPL kelas D <br>
Dosen : KURNIAWAN EKA PERMANA, S.Kom., M.Sc <br>

### Cara Install & Setup
1.silahkan clone atau download repository ini.<br>
2.silahkan extrack dan rename nama folder menjadi garuda.<br>
3.buat sebuah database baru dengan nama cigenerator lalu import file cigenerator.sql.<br>
4.buka web browser dan masukan http://localhost/garuda/ pada address bar.

### Autehntifikasi
Untuk melakukan proses login silahkan gunakan akun default berikut :<br>
Email : tes@gmail.com<br>
Password : password

## Fitur Fitur :

### 1. Dropdown Dinamis
Fungsi ini digunaan untuk membuat dropdown dinamis dengan data yang berasal dari database, cara penggunaan :<br>
``` <?php echo cmb_dinamis(NamaElement,NamaTabel,NamaField,PrimaryKey,DefaultValue);?>```<br>
Contoh : <br>
``` <?php echo datalist_dinamis('cmb_kelas','tbl_kelas','nama_kelas','id_kelas',5) ?>```

### 2. Datalist Dinamis
Fungsi ini digunaan untuk membuat datalist dinamis dengan data yang berasal dari database, cara penggunaan :<br>
``` <?php echo datalist_dinamis(NamaElement,NamaTabel,NamaField,DefaultValue);?>```<br>
Contoh : <br>
``` <?php echo datalist_dinamis('ListUser','tbl_users','nama_lengkap') ?>```

### 3.Select Select Dinamis
Fungsi ini digunaan untuk membuat select2 dinamis dengan data yang berasal dari database, cara penggunaan :<br>
``` <?php echo select2_dinamis(NamaElement,NamaTabel,NamaField,PlaceHolder);?>```<br>
Contoh : <br>
``` <?php echo select2_dinamis('ListUser','tbl_users','nama_lengkap','Masukan Nama Users') ?>```

### Credit To : 
1.[Harviacode ](http://harviacode.com/) <br>
2.[AdminLTE](https://adminlte.io/)<br>
2.[Garuda-Crud-Generator](https://github.com/nurisakbar/Garuda-CRUD-Generator)<br>