<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?>/</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dashboard/css/atlantis.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Data Dokumentasi Pekerjaan</h2>
        <p></p>
        <table id="add-row" class="display table table-striped table-hover" >
            <thead>
                <tr>
                <th>ID Jadwal Service</th>
                <th>Nama Pelanggan</th>
                <th>Status</th>
                <th>Terdaftar Tanggal</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <?php $dokgampek_id = $row->dokgampek_id;?>
                    <td><?= $row->jadser_id;?></td>
                    <td><?= $row->dokgampek_nama;?></td>
                    <td>
                        <?php if($row->dokgampek_status == '0'):?>
                            <span class="badge badge-primary">Proses Validasi</span>
                        <?php elseif($row->dokgampek_status == '1'):?>
                            <span class="badge badge-success">Disetujui</span>
                        <?php elseif($row->dokgampek_status == '2'):?>
                            <span class="badge badge-danger">Ditolak</span>
                        <?php endif;?>
                    </td>
                    <td><?= $row->dokgampek_datecreate;?></td>                                   
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>