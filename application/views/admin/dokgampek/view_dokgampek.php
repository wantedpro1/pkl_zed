<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Data Dokumentasi Pekerjaan</h2><br>
        <p hidden><?php
            $dokgampek_id           = $dokgampek['dokgampek_id'];
            $jadser_id              = $dokgampek['jadser_id'];
            $dokgampek_nama         = $dokgampek['dokgampek_nama'];
            $dokgampek_nopem        = $dokgampek['dokgampek_nopem'];
            $dokgampek_fotpek1      = $dokgampek['dokgampek_fotpek1'];
            $dokgampek_fotpek2      = $dokgampek['dokgampek_fotpek2'];
            $dokgampek_fotpek3      = $dokgampek['dokgampek_fotpek3'];
            $dokgampek_kargar       = $dokgampek['dokgampek_kargar'];
            $dokgampek_nsu          = $dokgampek['dokgampek_nsu'];
            $dokgampek_modun        = $dokgampek['dokgampek_modun'];
            $dokgampek_parbar       = $dokgampek['dokgampek_parbar'];
            $dokgampek_doklai       = $dokgampek['dokgampek_nsu'];
            $dokgampek_datecreate   = $dokgampek['dokgampek_datecreate'];
            $dokgampek_createby     = $dokgampek['dokgampek_createby'];
            $dokgampek_status       = $dokgampek['dokgampek_status'];

            $jadser_nama        = $jadser['jadser_nama'];
            $jadser_notelp      = $jadser['jadser_notelp'];
            $jadser_alamat      = $jadser['jadser_alamat'];
            $jadser_jenpek      = $jadser['jadser_jenpek'];
            $jadser_merk        = $jadser['jadser_merk'];
            $jadser_jenbar      = $jadser['jadser_jenbar'];
            $jadser_desker      = $jadser['jadser_desker'];
            $jadser_nsu         = $jadser['jadser_nsu'];
            $jadser_modun       = $jadser['jadser_modun'];
            $jadser_datecreate  = $jadser['jadser_datecreate'];
            $jadser_createby    = $jadser['jadser_createby'];
            $jadser_status      = $jadser['jadser_status'];

            $lokasi = $jadser_id.' '.str_replace( ':', '.', $dokgampek_datecreate).' - '.$dokgampek_nama;
        ?></p>

        <div class="row">
            <div class="col-6 col-sm-6">
                <p><b>No Dokumentasi: </b><?= $dokgampek_id;?></p>
                <p><b>Tanggal Dokumentasi: </b><?= $dokgampek_datecreate;?></p>
                <p><b>Nama Pelanggan: </b><?= $jadser_nama;?></p>
                <p><b>No Telepon: </b><?= $jadser_notelp;?></p>
                <p><b>Alamat: </b><?= $jadser_alamat;?></p>
            </div>
            <div class="col-6 col-sm-6">
                <p><b>No Jadwal Service: </b><?= $jadser_id;?></p>
                <p><b>Tanggal Service: </b><?= $jadser_datecreate;?></p>
                <p><b>Jenis Barang: </b><?= $jadser_jenbar;?></p>
                <p><b>Kerusakan: </b><?= $jadser_desker;?></p>
                <p><b>No Seri: </b><?= $jadser_nsu;?></p>
                <p><b>Model: </b><?= $jadser_modun;?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-4 text-center">
                <b>Nomor Pembelian</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_nopem;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_nopem;?></p>
            </div>
            <div class="col-6 col-sm-4 text-center">
                <b>Kartu Garansi</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_kargar;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_kargar;?></p>
            </div>
            <div class="col-6 col-sm-4 text-center">
                <b>Part Baru</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_parbar;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_parbar;?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-4 text-center">
                <b>Foto Pekerjaan 1</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_fotpek1;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_fotpek1;?></p>
            </div>
            <div class="col-6 col-sm-4 text-center">
                <b>Foto Pekerjaan 2</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_fotpek2;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_fotpek2;?></p>
            </div>
            <div class="col-6 col-sm-4 text-center">
                <b>Foto Pekerjaan 3</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_fotpek3;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_fotpek3;?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-4 text-center">
                <b>Nomor Seri Unit</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_nsu;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_nsu;?></p>
            </div>
            <div class="col-6 col-sm-4 text-center">
                <b>Model Unit</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_modun;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_modun;?></p>
            </div>
            <div class="col-6 col-sm-4 text-center">
                <b>Dokumentasi Lainnya</b>
                <img src="<?= base_url().'assets/dokumentasi/'.$lokasi.'/'.$dokgampek_doklai;?>" style="width:100%;" alt="">
                <br>
                <p><?=$dokgampek_doklai;?></p>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/dashboard/js/core/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>