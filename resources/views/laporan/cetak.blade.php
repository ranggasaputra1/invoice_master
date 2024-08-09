<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV. Refcool Mitra Teknik | Print Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: roboto, sans-serif;
            margin: 20px;
            padding: 0;
            font-size: 10px;
        }

        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }


        .table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-size: 10px;
        }

        .table td {
            font-size: 10px;
        }

        .table tfoot td {
            font-weight: bold;
            font-size: 10px;
        }


        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #666;
            text-align: left;

        }

        hr {
            border: 1px solid black;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container overflow-hidden">
        <div class=" grid row justify-content-between w-100 ">
            <img class="col my-start" style="max-width: 150px; max-height: 150px"
                src="https://www.serviceacbandungcimahi.com/wp-content/uploads/2022/07/logo-service-ac-bandung-rev-1.png"
                alt="Logo" />
            <div class="text-end col-8">
                <h5 class="m-0 fw-bold">
                    PENAWARAN CUCI CLEANING AC & <br />
                    PENAMBAHAN FREON
                </h5>
                <p class="m-0"><b>REFCOOL MITRA TEKNIK</b></p>
                <p class="m-0">
                    Jl. Pojok utara 2 Gg.abu bakar 2 Rt 04/ Rw 05 Kel.setiamanah <br />
                    Kec.Cimahi tengah <br />
                    Cimahi Jawa barat 40524
                </p>
                <p class="m-0">ID</p>
                <br />
                <p class="m-0">www.serviceacbandungcimahi.com</p>
                <p class="m-0">085321480170</p>
                <p class="m-0">Apeprefac@gmail.com</p>
            </div> <br>

        </div>

        <div class="info">
            <p>
                <strong>Laporan Kurang Bayar Atau Lebih Setor</strong>
            </p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Masa Pajak</th>
                    <th>SubTotal</th>
                    <th>PPN Keluaran</th>
                    <th>PPN Masukan</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporans as $laporan)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($laporan->tax_due)->format('F') }}</td>
                        <td>Rp {{ number_format($laporan->amount_paid) }}</td>
                        <td>Rp {{ number_format($laporan->ppn_out) }}</td>
                        <td>Rp {{ number_format($laporan->ppn_in) }}</td>
                        <td>Rp {{ number_format($laporan->total) }}</td>
                        <td>{{ $laporan->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>

            </tbody>

        </table>
        <br />

        <hr>

        <div class="grid row justify-content-between mt-5">
            <p class="col text-center">REFCOOL MITRA TEKNIK</p> <br>
            <center>
                <img class="col text-center" style="max-width: 60px; max-height:50px"
                    src="https://www.serviceacbandungcimahi.com/wp-content/uploads/2022/07/logo-service-ac-bandung-rev-1.png"
                    alt="Logo" />
            </center><br><br>

            <hr style="width: 20%; margin: 0 auto; border: 1px solid black;">
        </div>
    </div>
</body>

</html>
