<?php
    $title = "Ini Contoh";
    $judul = "Data Siswa";
    $listSiswa = [
        [
            'nama' => 'Budi',
            'kelas' => 10
        ],
        [
            'nama' => 'Charly',
            'kelas' => 11
        ],
        [
            'nama' => 'Dicky',
            'kelas' => 9
        ],
        [
            'nama' => 'Edi',
            'kelas' => 10
        ],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        table {
            border-collapse: collapse;
        }
        table tr th, table tr td {
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1><?= $judul ?></h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listSiswa as $siswa) { ?>
                <tr>
                    <td><?= $siswa['nama'] ?></td>
                    <td><?= $siswa['kelas'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>