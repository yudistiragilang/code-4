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
	<a href="<?php echo base_url(); ?>/anggota/add_new">Add New</a>
    <table border="1" cellpadding="10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach($anggota as $dt):?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $dt['nama'];?></td>
                <td><?= $dt['alamat'];?></td>
                <td><?= $dt['telepon'];?></td>
                <td><a href="<?= base_url(); ?>/anggota/edit/<?= $dt['id'];?>">Edit</a> || <a href="<?= base_url(); ?>/anggota/delete/<?= $dt['id'];?>">Delete</a></td>
            </tr>
        <?php $no++; ?>
        <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>