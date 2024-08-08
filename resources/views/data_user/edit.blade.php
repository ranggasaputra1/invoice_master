@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data User</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- ACTION MENGARAH KE /user/id -->
                        <form action="{{ url('/data_user/' . $data_user->id) }}" method="post">
                            @csrf
                            <!-- KARENA METHOD YANG AKAN DIGUNAKAN ADALAH PUT -->
                            <!-- MAKA KITA PERLU MENGIRIMKAN PARAMETER DENGAN NAME _method -->
                            <!-- DAN VALUE PUT -->
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama User</label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ $data_user->name }}" placeholder="Masukkan Masukan Nama Users">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    value="{{ $data_user->email }}" placeholder="Masukkan Masukan Nama Users">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="level">Role</label>
                                <select name="level" class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}">
                                    <option value="admin">admin</option>
                                    <option value="keuangan">keuangan</option>
                                    <option value="direktur">direktur</option>
                                </select>
                                <p class="text-danger">{{ $errors->first('level') }}</p>
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
