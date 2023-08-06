<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Slip Gaji</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th {
                text-align: left;
            }
            table th, table td {
                border: 1px solid black;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <center>
            <h3>Slip Gaji Bulan {{ $bulan }} Tahun {{ $tahun }}</h3>
        </center>

        <div style="display: flex; align-items:center">
            <img src="{{ public_path('logo.jpg') }}" alt="" style="width: 70px; height:70px">
            {{ config('app.name') }}
        </div>
        <table>
            <tr>
                <th>Gaji Poko</th>
                <td>{{ number_format($gajiPokok, 0) }}</td>
            </tr>
            <tr>
                <th>Potongan</th>
                <td>{{ number_format($potongan, 0) }}</td>
            </tr>
        </table>
    </body>
</html>
