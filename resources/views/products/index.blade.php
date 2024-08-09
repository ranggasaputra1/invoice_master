@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="card-title">Data Produk</h3>
                                    <a href="{{ url('/product/new') }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus"></i> Tambah Data
                                    </a>
                                </div>

                                <div class="dropdown mt-3">
                                    <form action="{{ url('/product') }}" method="GET">
                                        <button class="btn btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Search By Category
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/product?category=' . $category) }}">
                                                        {{ $category }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </form>



                                </div>

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
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->categories }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>Rp {{ number_format($product->price) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form action="{{ url('/product/' . $product->id) }}" method="POST"
                                                align="center">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                <a href="{{ url('/product/' . $product->id) }}"
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
