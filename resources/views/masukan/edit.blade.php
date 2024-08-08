@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Produk</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- ACTION MENGARAH KE /masukan/id -->
                        <form action="{{ url('/masukan/' . $masukan->id) }}" method="post">
                            @csrf
                            <!-- KARENA METHOD YANG AKAN DIGUNAKAN ADALAH PUT -->
                            <!-- MAKA KITA PERLU MENGIRIMKAN PARAMETER DENGAN NAME _method -->
                            <!-- DAN VALUE PUT -->
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $masukan->name }}" placeholder="Masukkan nama produk">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="address" cols="10" rows="10" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}">{{ $masukan->address }}</textarea>
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Total Item</label>
                                <input type="number" name="totalitem" class="form-control {{ $errors->has('totalitem') ? 'is-invalid':'' }}" value="{{ $masukan->totalitem}}">
                                <p class="text-danger">{{ $errors->first('totalitem') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">SubTotal</label>
                                <input type="number" name="subtotal" class="form-control {{ $errors->has('subtotal') ? 'is-invalid':'' }}" value="{{ $masukan->subtotal }}">
                                <p class="text-danger">{{ $errors->first('subtotal') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Pajak</label>
                                <input type="number" name="tax" class="form-control {{ $errors->has('tax') ? 'is-invalid':'' }}" value="{{ $masukan->tax }}">
                                <p class="text-danger">{{ $errors->first('tax') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="number" name="total" class="form-control {{ $errors->has('total') ? 'is-invalid':'' }}" value="{{ $masukan->total }}">
                                <p class="text-danger">{{ $errors->first('total') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
