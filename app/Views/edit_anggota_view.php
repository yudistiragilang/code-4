<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/public/favicon.ico"/>
    <title><?= $title; ?></title>
</head>
<body>
    <form action="<?php echo base_url(); ?>/anggota/update" method="post">
        <input type="text" name="nama" value="<?= $anggota->nama;?>">
        <input type="text" name="alamat" value="<?= $anggota->alamat;?>">
        <input type="text" name="telepon" value="<?= $anggota->telepon;?>">
        <input type="hidden" name="id" value="<?= $anggota->id;?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>