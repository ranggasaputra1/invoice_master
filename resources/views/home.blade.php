@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <h1 align="center" style="padding-top: 75px">Selamat Datang</h1>
            </div>
            <div class="col-md-12">
                <div class="text-center" style="padding-top: 75px">
                    <img src="{{ asset('/image/image2.png') }}" alt="" width="400px" height="150px">
                </div>

                <div class="text-center" style="padding-top: 50px">
                    <img src="{{ asset('/image/image3.png') }}" alt="" width="300px" height="300px">
                </div>
                <h2 align="center" style="padding-top: 50px">Jl. Pojok Utara II No.226, Setiamanah, Kec. Cimahi Tengah, Kota
                    Cimahi, Jawa Barat 40524</h2>
            </div>
            <div class="col-lg-12 col-xs-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
