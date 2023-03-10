@extends('admin.layouts.app')
@section('title','Dashboard | Update')
@section('header', 'Edit Petugas')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-outline card-primary">
            </div>
            <form action="{{ route('update.petugas', $petugas->id_petugas ) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama_petugas')is-invalid

                                @enderror" name="nama_petugas" placeholder="Masukan nama"
                                    value="{{ $petugas->nama_petugas }}">
                                @if ($errors->has('nama_petugas'))
                                <div class="text-danger">{{ $errors->first('nama_petugas') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="username">username</label>
                            <div class="form-group">
                                <input type="text" class="form-control @error('username')is-invalid

                                @enderror" name="username" placeholder="Masukan username"
                                    value="{{ $petugas->username }}">
                                @if ($errors->has('username'))
                                <div class="text-danger">{{ $errors->first('username') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control @error('password')is-invalid

                                @enderror" name="password" placeholder="Masukan password"
                                    value="{{ $petugas->password }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telpon">telpon</label>
                                <input type="number" class="form-control @error('telp')is-invalid

                                @enderror" name="telp" placeholder="(+62)821165278" value="{{ $petugas->telp }}">
                                @if ($errors->has('telp'))
                                <div class="text-danger">{{ $errors->first('telp') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">level</label>
                                <select name="level" id="level" class="custom-select @error('level')is-invalid

                                @enderror">
                                    @if($petugas->level == 'admin')
                                    <option selected value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    @else
                                    <option selected value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                    @endif
                                </select>
                                @if ($errors->has('level'))
                                <div class="text-danger">{{ $errors->first('level') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control @error('tgl_lahir')is-invalid

                            @enderror" id="datepicker" name="tgl_lahir" placeholder="d/m/Y"
                                value="{{ $petugas->tgl_lahir }}">
                            @if ($errors->has('tgl_lahir'))
                            <div class="text-danger">{{ $errors->first('tgl_lahir') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="custom-select @error('gender')is-invalid

                                @enderror">
                                    @if($petugas->gender == 'laki-laki')
                                    <option selected value="laki-laki">laki laki</option>
                                    <option value="perempuan">Perempuan</option>
                                    @else
                                    <option selected value="Perempuan">Perempuan</option>
                                    <option value="laki-laki">laki laki</option>
                                    @endif
                                </select>
                                @if ($errors->has('gender'))
                                <div class="text-danger">{{ $errors->first('gender') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="10" rows="2"></textarea>
                        </div>
                    </div> --}}
                    <button class="btn btn-primary float-right " style="width:30%">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection