@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Invoive Masukan</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ url('/masukan') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $masukan->name ?? '' }}" placeholder="Instansi">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="address" cols="10" rows="10" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}"></textarea>
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Total Item</label>
                                <input type="number" name="totalitem" class="form-control {{ $errors->has('totalitem') ? 'is-invalid':'' }}" value="{{ $masukan->totalitem ?? 0 }}">
                                <p class="text-danger">{{ $errors->first('totalitem') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">SubTotal</label>
                                <input type="number" name="subtotal" class="form-control {{ $errors->has('subtotal') ? 'is-invalid':'' }}" value="{{ $masukan->subtotal ?? 0 }}">
                                <p class="text-danger">{{ $errors->first('subtotal') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Pajak</label>
                                <input type="number" name="tax" class="form-control {{ $errors->has('tax') ? 'is-invalid':'' }}" value="{{ $masukan->tax ?? 0 }}">
                                <p class="text-danger">{{ $errors->first('tax') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="number" name="total" class="form-control {{ $errors->has('total') ? 'is-invalid':'' }}" value="{{ $masukan->total ?? 0 }}">
                                <p class="text-danger">{{ $errors->first('total') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> Simpan</button>
                                <a href="{{ url('/masukan') }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
