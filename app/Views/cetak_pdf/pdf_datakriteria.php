<!DOCTYPE html>
<html>

<head>
    <title>Data Kriteria</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h3>Data Kriteria</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kriteria</th>
            <th>Kategori</th>
            <th>Bobot</th>
        </tr>
        <?php $no = 1;
        foreach ($kriteria as $k): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $k['kode_kriteria'] ?></td>
                <td><?= $k['nama_kriteria'] ?></td>
                <td><?= $k['kategori_utama'] ?></td>
                <td><?= $k['bobot'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>