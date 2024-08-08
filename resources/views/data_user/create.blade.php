@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data User</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ url('/data_user') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Masukkan Nama">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="Masukkan Email">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    placeholder="Masukkan Password">
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                    placeholder="Konfirmasi Password">
                                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="level">Role</label>
                                <select name="level"
                                    class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}">
                                    <option value="admin">admin</option>
                                    <option value="keuangan">keuangan</option>
                                    <option value="direktur">direktur</option>
                                </select>
                                <p class="text-danger">{{ $errors->first('level') }}</p>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i>
                                    Simpan</button>
                                <a href="{{ url('/data_user') }}" class="btn btn-danger btn-sm"><i
                                        class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
