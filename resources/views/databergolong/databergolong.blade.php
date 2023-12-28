@extends('layout.main')
@section('title', 'datadistribusifs.index')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Distribusi Frekuensi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas Interval</th>
                            <th>Nilai Tengah</th>
                            <th>Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($scoreGroups as $group)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $group['kelas_interval'] }}</td>
                            <td>{{ $group['nilai_tengah'] }}</td>
                            <td>{{ $group['frekuensi'] }}</td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data User belum Tersedia.
                        </div>
                        @endforelse                                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
