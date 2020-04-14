<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
<body>
    <form action="/anggota/save" method="post">
        <input type="text" name="nama">
        <input type="text" name="alamat">
        <input type="text" name="telepon">
        <button type="submit">Save</button>
    </form>
</body>
</html>