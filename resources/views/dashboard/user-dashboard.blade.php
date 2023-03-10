@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    integrity="sha384-HVSkflmJvKtDQ2tPz3+XuMpK1LVkA7RlYp08hqV7LrpwLwvD++Q2Kyq3qvd7W16j" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/users/css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('/users/css/laporan.css') }}">
@endsection

@section('title', 'SIPAKAT - Sistem Pengaduan Masyarakat')

{{-- request untuk status tab --}}
{{-- {{ request('status') == null ? 'active' : '' }} --}}


@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <h4 class="semi-bold mb-0 text-white">SIPAKAT</h4>
                    <p class="italic mt-0 text-white">Sistem Pengaduan Masyarakat</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false" style="color: white;">
                                {{
                                Auth::guard('masyarakat')->user()->nama
                                }}
                            </a>
                            <div class="dropdown-menu">
                                {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout/admin">Logout</a>
                            </div>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

</section>
{{-- Section Card --}}
<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                @endif
                <div class="card-header">
                    <h5 class="text-center" style="color: #6a70fc">Tulis Laporan Disini</h5>
                </div>
                <div class="card-header">
                    <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: black">Judul laporan</label>
                            <input name="judul_laporan" placeholder="Masukkan judul Laporan" class="form-control @error('judul_laporan')is-invalid

                        @enderror" rows="4">{{ old('judul_laporan') }}</input>
                            @if ($errors->has('judul_laporan'))
                            <div class="text-danger">{{ $errors->first('judul_laporan') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: black">Isi laporan</label>
                            <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control @error('isi_laporan')is-invalid

                        @enderror" rows="4">{{ old('isi_laporan') }}</textarea>
                            @if ($errors->has('isi_laporan'))
                            <div class="text-danger">{{ $errors->first('isi_laporan') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: black">kategori</label>
                            <select name="id_kategori" class="custom-select @error('id_kategori')is-invalid @enderror">
                                <option selected disabled>Pilih kategori</option>
                                @foreach ($kategori as $item )
                                <option value="{{ $item->id_kategori }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_kategori'))
                            <div class="text-danger">{{ $errors->first('id_kategori') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: black">Alamat</label>
                            <textarea name="alamat" cols="10" rows="2" placeholder="Masukkan alamat" class="form-control @error('alamat')is-invalid

                                            @enderror" rows="4">{{ old('alamat') }}</textarea>
                            @if ($errors->has('alamat'))
                            <div class="text-danger">{{ $errors->first('alamat') }}</div>
                            @endif
                        </div>
                        <div class="form-group mt-4">
                            <label for="exampleInputEmail1" style="color: black">Gambar laporan</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-custom mt-2">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div class="card-header" style="width: 100%">
                    <div>
                        <img src="{{ asset('/users/images/user_default.svg') }}" alt="user profile" class="photo">
                        <div class="self-align">
                            <h5><a style="color: #6a70fc" href="#">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                            </h5>
                            <p class="text-dark">{{ Auth::guard('masyarakat')->user()->username }}</p>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p class="italic mb-0 text-danger">pending</p>
                                <div class="text-center text-danger">
                                    {{ $pending }}
                                </div>
                            </div>
                            <div class="col">
                                <p class="italic mb-0 text-warning">Proses</p>
                                <div class="text-center text-warning">
                                    {{ $proses}}
                                </div>
                            </div>
                            <div class="col">
                                <p class="italic mb-0 text-success">Selesai</p>
                                <div class="text-center text-success">
                                    {{ $selesai }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('user.laporan') }}" style="text-decoration:none;">Laporan saya</a>
                    </li>
                    {{-- <li class="list-group-item">
                        <a href="" style="text-decoration:none;">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>Setting</p>
                        </a>
                    </li> --}}
                    <li class="list-group-item"> <a href="/logout/admin" style="text-decoration:none;">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    @endsection

    @section('js')

    @endsection