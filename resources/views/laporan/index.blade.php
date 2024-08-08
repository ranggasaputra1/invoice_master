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
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($laporans as $laporan)
                                <tr>
                                    <td>{{ $laporan->title }}</td>
                                    <td>{{ $laporan->description }}</td>
                                    <td>Rp {{ number_format($laporan->price) }}</td>
                                    <td>{{ $laporan->stock }}</td>
                                    <td>{{ $laporan->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <form action="{{ url('/laporan/' . $laporan->id) }}" method="POST" align="center">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/laporan/' . $laporan->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> 
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
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



