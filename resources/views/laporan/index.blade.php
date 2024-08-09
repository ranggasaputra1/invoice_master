@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Laporan</h3> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ url('/laporan') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-download-alt"></i> Tarik Laporan</button>
                            </div>
                        </form>
                    </div>
                    <div class="x_content">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <table id="datatable" class="table table-striped table-bordered">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



