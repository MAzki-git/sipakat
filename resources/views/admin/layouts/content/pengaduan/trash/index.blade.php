@extends('admin.layouts.app')
@section('title','Dashboard | Sampah petugas')
@section('header', 'Sampah Petugas')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul pengaduan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul_laporan }}</td>
                                <td>{{ $item->tgl_pengaduan }}</td>
                                <td>
                                    @if($item->status=='0')
                                    <span href="#" class="badge badge-danger">Pending</span>
                                    @elseif($item->status == 'proses')
                                    <span href="#" class="badge badge-warning">Proses</span>
                                    @else
                                    <span href="#" class="badge badge-success">selesai</span>
                                    @endif
                                </td>
                                <td class="project-actions text-center">
                                    <a style="width: 40%" class="btn btn-primary btn-sm"
                                        href="{{ route('restore.pengaduan', $item->id_pengaduan) }}">
                                        <i class="fas fa-undo"></i>

                                        </i>
                                    </a>
                                    <a style="width:40%" href="{{ route('force.pengaduan', $item->id_pengaduan ) }}"
                                        class="delete-btn btn btn-danger btn-sm" style="width: 50%">
                                        <i class=" fas fa-trash">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection