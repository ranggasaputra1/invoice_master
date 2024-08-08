<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            margin: 20px auto;
            max-width: 900px;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            padding: 15px;
            color: #fff;
            border-bottom: 1px solid #e8e8e8;
        }

        .card-title {
            margin: 0;
            font-size: 1.5rem;
        }

        .x_content {
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.875rem;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
            font-size: 0.875rem;
            padding: 5px 10px;
            border-radius: 12px;
        }

        h3 {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
        }

        .float-right {
            margin-top: 15px;
            text-align: right;
        }

        @media (max-width: 768px) {
            .card-title {
                font-size: 1.25rem;
            }

            .x_content {
                padding: 10px;
            }

            .table th,
            .table td {
                padding: 8px;
            }

            .badge-success {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h3>CV. Refcoll Mitra Teknik</h3>
        </center>
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Cetak Invoice</h3>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>No Telp</th>
                            <th>Total Item</th>
                            <th>Subtotal</th>
                            <th>Pajak</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->customer->name }}</td>
                            <td>{{ $invoice->customer->phone }}</td>
                            <td><span class="badge badge-success">{{ $invoice->detail->first()->qty }} Item</span></td>
                            <td>Rp {{ number_format($invoice->total) }}</td>
                            <td>Rp {{ number_format($invoice->tax) }}</td>
                            <td>Rp {{ number_format($invoice->total) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="float-right"></div>
            </div>
        </div>
    </div>
</body>

</html>
