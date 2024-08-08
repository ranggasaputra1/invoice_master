@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Produk</h3> <a href="{{ url('/masukan/new') }}"
                                    class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
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
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>Total Item</th>
                                    <th>SubTotal</th>
                                    <th>Pajak</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($masukans as $masukan)
                                    <tr>
                                        <td>{{ $masukan->name }}</td>
                                        <td>{{ $masukan->address }}</td>
                                        <td>{{ $masukan->totalitem }}</td>
                                        <td>Rp {{ number_format($masukan->subtotal) }}</td>
                                        <td>Rp {{ number_format($masukan->tax) }}</td>
                                        <td>Rp {{ number_format($masukan->total) }}</td>
                                        <td>{{ $masukan->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form action="{{ url('/masukan/' . $masukan->id) }}" method="POST"
                                                align="center">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                <a href="{{ url('/masukan/' . $masukan->id) }}"
                                                    class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
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
